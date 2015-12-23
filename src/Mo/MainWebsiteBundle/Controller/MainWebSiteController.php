<?php

namespace Mo\MainWebsiteBundle\Controller;

use Mo\DataBundle\Entity\Message;
use Mo\DataBundle\Form\Type\MessageType;
use Mo\MainWebsiteBundle\Event\ContactMessageEvent;
use Mo\MainWebsiteBundle\Event\NotificationsEvents;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainWebSiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('@MoMainWebsite/index.html.twig');
    }

    public function howtoAction()
    {
        return $this->render('@MoMainWebsite/howto.html.twig');
    }

    public function contactAction(Request $request)
    {
        $message = new Message();
        $form = $this->createForm(new MessageType(), $message);
        $form->remove('ip');

        $form->handleRequest($request);

        if($form->isValid()){

            $em = $this->getDoctrine()->getManager();

            $em->persist($message);

            $em->flush();

            $event = new ContactMessageEvent($message);
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch(NotificationsEvents::MO_WEBSITE_NEW_CONTACT_MESSAGE, $event);

            return $this->redirect($this->generateUrl('mo_main_website_index'));
        }

        return $this->render('MoMainWebsiteBundle::contact.html.twig',
            array('form' => $form->createView()));

    }

}
