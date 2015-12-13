<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 9/12/15
 * Time: 22:42
 */

namespace Mo\AdmBundle\Controller;


use Mo\DataBundle\Entity\Client;
use Mo\AdmBundle\Event\LoggerEvents;
use Mo\AdmBundle\Event\NewClientEvent;
use Mo\DataBundle\Form\Type\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ClientsController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getRepository('MoDataBundle:Client');
        $clients = $em->findAll();

        return $this->render('MoAdmBundle::clients.html.twig', array('clients' => $clients));
    }

    public function createAction(Request $request)
    {
        $client = new Client();
        $form = $this->createForm(new ClientType(), $client);

        $form->handleRequest($request);

        if ($form->isValid()) {


            $passPlain = $client->getPass();

            $security = $this->container->get('mo.security');

            $client->setPass($security->encodePassword($passPlain));

            $em = $this->getDoctrine()->getManager();

            $em->persist($client);

            $em->flush();

            $this->get('event_dispatcher')->dispatch(LoggerEvents::MO_WEBSITE_CLIENT_NEW, new NewClientEvent($client));

            return $this->redirect($this->generateUrl('mo_adm_clients'));
        }

        return $this->render('MoAdmBundle::client_new.html.twig', array('form' => $form->createView()));
    }

}