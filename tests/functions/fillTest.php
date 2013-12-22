<?php

namespace felpado\tests;

use felpado as f;

class fillTest extends felpadoTestCase
{
    public function testItFills()
    {
        $coll = array('a' => 1);
        $rules = array(
            'a' => f\optional(array('validator' => 'is_int')),
            'b' => f\optional(array('validator' => 'is_float', 'defaultValue' => 2.0)),
            'c' => f\optional(array('validator' => 'is_string', 'defaultValue' => 'foo'))
        );

        $expected = array('a' => 1, 'b' => 2.0, 'c' => 'foo');

        $this->assertSame($expected, f\fill($coll, $rules));
    }

    /**
     * @expectedException \Exception
     */
    public function testItThrowsAnExceptionIfARequiredDoesNotExist()
    {
        $coll = array();
        $rules = array('a' => f\required(array('validator' => 'is_int')));

        f\fill($coll, $rules);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsAnExceptionIfARuleIsNotAnInstanceOfParamRule()
    {
        $coll = array();
        $rules = array('a' => 'is_int');

        f\fill($coll, $rules);
    }
}
