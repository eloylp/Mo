<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 12/12/15
 * Time: 2:03
 */

namespace Mo\MainWebsiteBundle\Event;


use Mo\MainWebsiteBundle\Entity\Client;
use Symfony\Component\EventDispatcher\Event;

class NewClientEvent extends Event
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getClient(){

        return $this->client;
    }
}