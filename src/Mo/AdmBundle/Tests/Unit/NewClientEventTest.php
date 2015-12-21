<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 21/12/15
 * Time: 17:14
 */

namespace Mo\AdmBundle\Test\Unit;


use Mo\AdmBundle\Event\NewClientEvent;


class NewClientEventTest extends \PHPUnit_Framework_TestCase
{

    private $client;

    public function setUp()
    {


        $this->client = $this->getMockBuilder('Mo\DataBundle\Entity\Client')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testSetterOk()
    {

        new NewClientEvent($this->client);
    }

    public function testSetterNook()
    {
        $this->setExpectedException('PHPUnit_Framework_Error');
        new NewClientEvent('xcxc');

    }

}