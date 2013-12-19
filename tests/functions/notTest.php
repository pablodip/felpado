<?php

namespace felpado\tests;

use felpado as f;

class notTest extends felpadoTestCase
{
    /**
     * @dataProvider provideNotTrue
     */
    public function testNotTrue($value)
    {
        $this->assertTrue(f\not($value));
    }

    public function provideNotTrue()
    {
        return array(
            array(false),
            array(0),
            array(''),
            array(array())
        );
    }
    /**
     * @dataProvider provideNotFalse
     */
    public function testNotFalse($value)
    {
        $this->assertFalse(f\not($value));
    }

    public function provideNotFalse()
    {
        return array(
            array(true),
            array(1),
            array('a'),
            array(array(false))
        );
    }
}
