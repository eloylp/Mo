<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 9/12/15
 * Time: 22:42
 */

namespace Mo\DataBundle\Controller;


use Mo\DataBundle\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientsController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getRepository('MoDataBundle:Client');
        $clients = $em->findAll();

        return $this->render('MoMainWebsiteBundle::clients.html.twig', array('clients' => $clients));
    }

}