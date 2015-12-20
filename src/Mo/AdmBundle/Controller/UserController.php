<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 12/12/15
 * Time: 17:39
 */

namespace Mo\AdmBundle\Controller;


use Mo\DataBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    public function listAction(){

        $em = $this->getDoctrine()->getRepository('MoDataBundle:User');

        $users = $em->findAll();

        return $this->render('MoAdmBundle::users_list.html.twig', array('users' => $users));

    }

    public function updateAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('MoDataBundle:User')->find($id);

        if(!$user){
            $this->createNotFoundException('User not found.');
        }

        $form = $this->createForm(new UserType(), $user, array('method' => 'PUT'));

        $form->remove('password');
        $form->remove('username');
        $form->remove('email');

        $form->handleRequest($request);

        if($form->isValid()){
            $user->setRoles(implode(' ', $user->getRoles()));
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('mo_adm_users'));
        }

        $viewData = array(
            'form' => $form->createView(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail()
        );


        return $this->render('MoAdmBundle::user_update_form.html.twig', $viewData);

    }

}