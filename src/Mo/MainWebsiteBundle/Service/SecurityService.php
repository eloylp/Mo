<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 7/12/15
 * Time: 17:33
 */

namespace Mo\MainWebsiteBundle\Service;


class SecurityService implements SecurityServiceInterface
{

    public function encodePassword($string)
    {

        $salt = $this->generateSalt();

        $pass = crypt($string, $salt);

        return $pass;
    }

    public function generateSalt()
    {

        $cost = 10;
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = sprintf("$2a$%02d$", $cost) . $salt;

        return $salt;

    }
}