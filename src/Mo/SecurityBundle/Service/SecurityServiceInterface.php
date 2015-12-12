<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 9/12/15
 * Time: 22:58
 */

namespace Mo\SecurityBundle\Service;


interface SecurityServiceInterface
{
    public function encodePassword($string);

    public function generateSalt();

}