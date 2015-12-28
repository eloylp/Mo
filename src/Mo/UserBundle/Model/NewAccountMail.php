<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 27/12/15
 * Time: 0:09
 */

namespace Mo\UserBundle\Model;


use Mo\DataBundle\Entity\User;

class NewAccountMail implements MailInterface
{

    private $user;
    private $subject;
    private $to;
    private $html_template;
    private $text_template;


    public function __construct(User $user)
    {
        $this->user = $user;
        $this->html_template = 'mail_activation.html.twig';
        $this->text_template = 'mail_activation.text.twig';
        $this->subject = 'Welcome ' . $user->getUsername() . ' , you need to activate your account.';
        $this->to = $user->getEmail();
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getHTMLTemplate()
    {
        return $this->html_template;
    }

    public function getTextTemplate()
    {
        return $this->text_template;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getEntityArray()
    {

        return array(

            'useremail' => $this->user->getEmail(),
            'opcode' => $this->user->getOpcode()
        );
    }

    public function getDestination(){

        return $this->to;
    }

}