<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 24/12/15
 * Time: 11:47
 */

namespace Mo\MainWebsiteBundle\Event;

use Mo\DataBundle\Entity\User;
use Symfony\Component\EventDispatcher\Event;

class NewUserEvent extends Event
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

}