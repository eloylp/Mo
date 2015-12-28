<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 27/12/15
 * Time: 0:10
 */

namespace Mo\UserBundle\Model;


use Mo\DataBundle\Entity\User;

interface MailInterface
{

    public function __construct(User $user);

    public function getSubject();

    public function getDestination();

    public function getHTMLTemplate();

    public function getTextTemplate();

    public function getEntityArray();

    public function getUser();


}