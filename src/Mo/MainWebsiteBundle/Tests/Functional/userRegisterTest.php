<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 21/12/15
 * Time: 22:49
 */

namespace Mo\MainWebsiteBundle\Tests\Functional;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class userRegisterTest extends WebTestCase
{
    public function testRegisterOk()
    {

        $client = static::createClient();

        $client->followRedirects(true);

        $crawler = $client->request('GET', '/users/create');


        $this->assertEquals($client->getResponse()->getStatusCode(), 200);

        $uniqid = uniqid();

        $form = $crawler->filter('form[name=user]')->form(array(

            'user[username]' => 'testing_func',
            'user[email]' => 'testing@testing_' . $uniqid . '.com',
            'user[password][first]' => 'abc123.',
            'user[password][second]' => 'abc123.'
        ));

        $crawler = $client->submit($form);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }

}