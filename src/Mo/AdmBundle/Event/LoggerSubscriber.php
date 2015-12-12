<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 12/12/15
 * Time: 1:57
 */

namespace Mo\AdmBundle\Event;


use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LoggerSubscriber implements EventSubscriberInterface
{

    private $monolog;

    public function __construct(LoggerInterface $monolog)
    {
        $this->monolog = $monolog;
    }

    public static function getSubscribedEvents()
    {

        return array(

            LoggerEvents::MO_WEBSITE_CLIENT_NEW => 'onMoWebsiteClientNew',
            LoggerEvents::MO_WEBSITE_PRODUCT_NEW => 'onMoWebsiteProductNew'

        );

    }

    public function onMoWebsiteClientNew(NewClientEvent $clientEvent)
    {
        $this->monolog->info(
            'Se ha creado el nuevo cliente ' . $clientEvent->getClient()->getName()
        );
    }

    public function onMoWebsiteProductNew(NewProductEvent $productEvent)
    {
        $this->monolog->info(
            'Se ha creado el nuevo producto ' . $productEvent->getProduct()->getName()
        );
    }

}