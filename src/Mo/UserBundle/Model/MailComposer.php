<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 27/12/15
 * Time: 17:07
 */

namespace Mo\UserBundle\Model;


/**
 * Class MailComposer
 * @package Mo\UserBundle\Model
 */
class MailComposer implements MailComposerInterface
{

    private $renderEngine;
    private $from;
    private static $twigNamespace = '@MoUser';

    public function __construct($renderEngine, $from)
    {
        $this->renderEngine = $renderEngine;
        $this->from = $from;
    }

    public function compose(MailInterface $mail)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($mail->getSubject())
            ->setFrom($this->from)
            ->setTo($mail->getDestination())
            ->setBody($this->renderEngine->render(
                self::$twigNamespace.'/'.$mail->getHTMLTemplate(),
                array('data' => $mail->getEntityArray())
            ), 'text/html')
            ->addPart(
                $this->renderEngine->render(
                    self::$twigNamespace.'/'.$mail->getTextTemplate(),
                    array('data' => $mail->getEntityArray())
                ), 'text/plain');

        return $message;
    }

}