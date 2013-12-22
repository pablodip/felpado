<?php

namespace felpado\tests;

use felpado as f;

class fill_validating_normalizing_or_throwTest extends felpadoTestCase
{
    public function testItWorks()
    {
        $collection = array('a' => 1);
        $paramRules = array(
            'a' => f\required(array('v' => 'is_int', 'n' => 'strval')),
            'b' => f\optional(array('d' => 2.0, 'n' => 'intval'))
        );

        $expected = array('a' => '1', 'b' => 2);

        $this->assertSame($expected, f\fill_validating_normalizing_or_throw($collection, $paramRules));
    }

    /**
     * @expectedException \Exception
     */
    public function ttestItThrowsIfValidationFails()
    {
        $collection = array('a' => 1);
        $paramRules = array('a' => f\optional(array('v' => 'is_float')));

        f\fill_validating_normalizing_or_throw($collection, $paramRules);
    }
}
