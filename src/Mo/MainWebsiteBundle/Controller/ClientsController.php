<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 9/12/15
 * Time: 22:42
 */

namespace Mo\MainWebsiteBundle\Controller;


use Mo\MainWebsiteBundle\Entity\Client;
use Mo\MainWebsiteBundle\Event\LoggerEvents;
use Mo\MainWebsiteBundle\Event\NewClientEvent;
use Mo\MainWebsiteBundle\Form\Type\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ClientsController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getRepository('MoMainWebsiteBundle:Client');
        $clients = $em->findAll();

        return $this->render('MoMainWebsiteBundle::clients.html.twig', array('clients' => $clients));
    }

    public function createAction(Request $request)
    {
        $client = new Client();
        $form = $this->createForm(new ClientType(), $client);

        $form->handleRequest($request);

        if ($form->isValid()) {


            $passPlain = $client->getPass();

            $security = $this->container->get('mo_main_website.security');

            $client->setPass($security->encodePassword($passPlain));

            $em = $this->getDoctrine()->getManager();

            $em->persist($client);

            $em->flush();

            $this->get('event_dispatcher')->dispatch(LoggerEvents::MO_WEBSITE_CLIENT_NEW, new NewClientEvent($client));

            return $this->redirect($this->generateUrl('mo_main_website_clients'));
        }

        return $this->render('@MoMainWebsite/client_new.html.twig', array('form' => $form->createView()));
    }

}