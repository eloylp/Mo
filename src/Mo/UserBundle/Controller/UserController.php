<?php

namespace Mo\UserBundle\Controller;

use Mo\DataBundle\Entity\User;
use Mo\DataBundle\Form\Type\UserType;
use Mo\MainWebsiteBundle\Event\NewUserEvent;
use Mo\MainWebsiteBundle\Event\NotificationsEvents;
use Mo\UserBundle\Model\NewAccountMail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();

        $data = array(
            'username' => $user->getUsername()
        );

        return $this->render('MoUserBundle::index.html.twig', $data);
    }


    public function createAction(Request $request)
    {

        $user = new User();
        $form = $this->createForm(new UserType(), $user);

        if($request->get('_route') == 'mo_user_register'){

            $form->remove('roles');
            $form->remove('isActive');

        }

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $encoder = $this->get('security.password_encoder');
            /// TODO FIX THIS , SOMETHING MORE SECURE
            $user->setOpcode(uniqid());
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            $user->setRoles('ROLE_USER');
            $em->persist($user);
            $em->flush();

            $activationMail = new NewAccountMail($user);
            $this->get('mo_user.mail_notificator')->send($activationMail);

            $dispatcher = $this->get('event_dispatcher');
            $event = new NewUserEvent($user);
            $dispatcher->dispatch(NotificationsEvents::MO_WEBSITE_NEW_USER, $event);

            return $this->redirect($this->generateUrl('mo_user_auth'));
        }

        return $this->render('MoUserBundle::register_form.html.twig',
            array('form' => $form->createView()));
    }

}
