<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 21/12/15
 * Time: 12:55
 */

namespace Mo\AdmBundle\Test\Unit;
use Mo\AdmBundle\Event\LoggerEvents;


/**
 * Class LoggerEventsTest
 * @package Mo\AdmBundle\Event
 */
class LoggerEventsTest extends \PHPUnit_Framework_TestCase
{
    private $_loggerEvents;

    public function setUp()
    {
        $this->_loggerEvents = new LoggerEvents();
    }

    public function testOnlyConstanst()
    {
        $this->assertEquals(0, count(get_class_methods($this->_loggerEvents)));
    }

    public function testConstantsKeyValuesFormat()
    {

        $rfc = new \ReflectionClass($this->_loggerEvents);
        $constants = $rfc->getConstants();

        foreach ($constants as $k => $v) {

            $this->assertRegExp('/([A-Z0-9_])+$/', $k);
            $this->assertRegExp('/([a-z\.])+$/', $v);
        }
    }


}
