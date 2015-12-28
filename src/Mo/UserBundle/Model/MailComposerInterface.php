<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 27/12/15
 * Time: 17:31
 */

namespace Mo\UserBundle\Model;


interface MailComposerInterface
{
    public function __construct($render, $from);

    public function compose(MailInterface $mail);

}