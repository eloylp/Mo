<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 21/12/15
 * Time: 17:14
 */

namespace Mo\AdmBundle\Test\Unit;


use Mo\AdmBundle\Event\NewProductEvent;


class NewProductEventTest extends \PHPUnit_Framework_TestCase
{

    private $product;

    public function setUp()
    {

        $this->product = $this->getMockBuilder('Mo\DataBundle\Entity\Product')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testSetterOk()
    {

        new NewProductEvent($this->product);
    }

    public function testSetterNook()
    {
        $this->setExpectedException('PHPUnit_Framework_Error');
        new NewProductEvent('xcxc');

    }

}