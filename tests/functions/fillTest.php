<?php

namespace felpado\tests;

use felpado as f;

class fillTest extends felpadoTestCase
{
    public function testItFills()
    {
        $coll = array('a' => 1);
        $rules = array('a' => f\optional('is_int'), 'b' => f\optional('is_float', 2.0), 'c' => f\optional('is_string', 'foo'));

        $expected = array('a' => 1, 'b' => 2.0, 'c' => 'foo');

        $this->assertSame($expected, f\fill($coll, $rules));
    }

    /**
     * @expectedException \Exception
     */
    public function testItThrowsAnExceptionIfARequiredDoesNotExist()
    {
        $coll = array();
        $rules = array('a' => f\required('is_int'));

        f\fill($coll, $rules);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsAnExceptionIfARuleIsNotAnInstanceOfValueRule()
    {
        $coll = array();
        $rules = array('a' => 'is_int');

        f\fill($coll, $rules);
    }
}
