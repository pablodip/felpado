<?php

namespace felpado\tests;

use felpado as f;

class fillTest extends felpadoTestCase
{
    public function testItFills()
    {
        $coll = array('a' => 1);
        $rules = array(
            'a' => f\optional(array('v' => 'is_int')),
            'b' => f\optional(array('v' => 'is_float', 'd' => 2.0)),
            'c' => f\optional(array('v' => 'is_string', 'd' => 'foo'))
        );

        $expected = array('a' => 1, 'b' => 2.0, 'c' => 'foo');

        $this->assertSame($expected, f\fill($coll, $rules));
    }

    public function testItReturnsTheResultInTheParamRulesOrder()
    {
        $coll = array('b' => 2.0);
        $rules = array(
            'a' => f\optional(array('d' => 1)),
            'b' => f\required()
        );

        $expected = array('a' => 1, 'b' => 2.0);

        $this->assertSame($expected, f\fill($coll, $rules));
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
