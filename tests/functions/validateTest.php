<?php

namespace felpado\tests;

use felpado as f;

class validateTest extends felpadoTestCase
{
    /**
     * @dataProvider provideValidate
     */
    public function testValidate($expected, $value, $callback)
    {
        $this->assertSame($expected, f\validate($value, $callback));
    }

    public function provideValidate()
    {
        return array(
            array(true, false, 'is_bool'),
            array(false, 'true', 'is_bool'),
            array(true, array(), 'is_array'),
            array(true, 'a', 'strlen')
        );
    }
}
