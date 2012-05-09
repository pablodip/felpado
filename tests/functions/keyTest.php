<?php

namespace Felpado\Tests;

class keyTest extends FunctionTestCase
{
    /**
     * @dataProvider keyNameProvider
     */
    public function testFkey($keyName)
    {
        $array = array('foo' => 10, 'bar' => 20);
        $key = $this->callFunction($keyName);

        $this->assertSame($array[$keyName], $key($array));
    }

    public function keyNameProvider()
    {
        return array(
            array('foo'),
            array('bar'),
        );
    }
}