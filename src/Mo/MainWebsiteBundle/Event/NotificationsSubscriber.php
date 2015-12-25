<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 23/12/15
 * Time: 21:29
 */

namespace Mo\MainWebsiteBundle\Event;


use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Serializer\Serializer;

class NotificationsSubscriber implements EventSubscriberInterface
{
    private $notificationLogger;

    public function __construct(LoggerInterface $notificationsLogger)
    {
        $this->notificationLogger = $notificationsLogger;
    }

    public static function getSubscribedEvents()
    {
        return array(

            NotificationsEvents::MO_WEBSITE_NEW_CONTACT_MESSAGE => 'onContactMessage',
            NotificationsEvents::MO_WEBSITE_NEW_USER => 'onNewUser'
        );
    }

    public function onContactMessage(ContactMessageEvent $event)
    {
        $this->notificationLogger
            ->notice("Se ha creado un nuevo mensaje en la web." .
                PHP_EOL .
                $event->__toString());

    }

    public function onNewUser(NewUserEvent $event){
        $this->notificationLogger
            ->notice('Se ha creado un nuevo usuario. '.
                $event->getUser()->getEmail());
    }

}