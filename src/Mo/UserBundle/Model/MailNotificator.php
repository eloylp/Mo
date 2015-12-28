<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 26/12/15
 * Time: 23:43
 */

namespace Mo\UserBundle\Model;


class MailNotificator
{
    private $mailer;
    private $mailComposer;

    public function __construct($mailer, MailComposerInterface $mailComposer)
    {
        $this->mailer = $mailer;
        $this->mailComposer = $mailComposer;
    }

    public function send(MailInterface $userMessage)
    {
        $message = $this->mailComposer->compose($userMessage);

        $this->mailer->send($message);
    }

}