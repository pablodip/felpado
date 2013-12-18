<?php

namespace felpado\tests;

class keyTest extends felpadoTestCase
{
    /**
     * @dataProvider keyNameProvider
     */
    public function testKey($keyName)
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
