<?php

namespace felpado\tests;

use felpado as f;

class keyTest extends felpadoTestCase
{
    /**
     * @dataProvider keyNameProvider
     */
    public function testKey($k)
    {
        $array = array('foo' => 10, 'bar' => 20);
        $key = f\key($k);

        $this->assertSame($array[$k], $key($array));
    }

    public function keyNameProvider()
    {
        return array(
            array('foo'),
            array('bar'),
        );
    }
}
