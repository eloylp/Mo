<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 23/12/15
 * Time: 22:27
 */

namespace Mo\MainWebsiteBundle\Event;


use Mo\DataBundle\Entity\Message;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ContactMessageEvent
 * @package Mo\MainWebsiteBundle\Event
 */
class ContactMessageEvent extends Event
{
    private $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {

        return $this->message;
    }

}