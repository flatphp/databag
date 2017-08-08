<?php
require_once __DIR__ .'/MyData.php';

class FilterTest extends PHPUnit_Framework_TestCase
{

    public function testPass()
    {
        $my = new MyData(array(
            'data1' => ' HeLLo ',
            'data2' => ' world@gmail.com '
        ));

        $res = $my->pass();
        $this->assertTrue($res);
        $this->assertEquals('hello', $my->data1);
    }

    public function testFail()
    {
        $my = new MyData(array(
            'data1' => ' HeLLo ',
            'data2' => ' world'
        ));

        $res = $my->fail();

        $this->assertTrue($res);
        $this->assertEquals('hello', $my->data1);
        $this->assertEquals('data2.email', $my->getFailedOn());
        $this->assertEquals('data2 must be email', $my->getFailedMessage());
    }

}
