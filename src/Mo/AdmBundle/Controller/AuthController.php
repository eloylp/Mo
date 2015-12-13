<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 12/12/15
 * Time: 17:20
 */

namespace Mo\AdmBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthController extends Controller
{

    public function formAction()
    {

        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('MoAdmBundle::login_form.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error
        ));


    }
    public function formCheckAction(){

    }
}