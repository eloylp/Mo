<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 12/12/15
 * Time: 2:03
 */

namespace Mo\AdmBundle\Event;


use Mo\DataBundle\Entity\Address;
use Symfony\Component\EventDispatcher\Event;

class NewClientEvent extends Event
{
    private $client;

    public function __construct(Address $client)
    {
        $this->client = $client;
    }

    public function getClient(){

        return $this->client;
    }
}