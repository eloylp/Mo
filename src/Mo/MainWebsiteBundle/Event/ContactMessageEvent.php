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

    public function __toString()
    {
        $message = 'Nombre: ' . $this->message->getName() . PHP_EOL . '
                    Apellidos: ' . $this->message->getLastName() . PHP_EOL . '
                    Email: ' . $this->message->getEmail() . PHP_EOL . '
                    Company: ' . $this->message->getCompany() . PHP_EOL . '
                    Subject: ' . $this->message->getSubject() . PHP_EOL . '
                    ip: ' . $this->message->getIp() . PHP_EOL . '
                    Creado: ' . $this->message->getCreatedAt()->format('d/m/Y H:i:s') . PHP_EOL . '
                    Content: ' . $this->message->getContent() . PHP_EOL;

        return $message;
    }

}