<?php

namespace felpado\tests;

use felpado as f;

class valuesTest extends felpadoTestCase
{
    /**
     * @dataProvider provideValues
     */
    public function testIt($exp, $coll)
    {
        $this->assertSame($exp, f\values($coll));
    }

    public function provideValues()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(), array()),
            array(array(1, 2, 3), array('one' => 1, 'two' => 2, 'three' => 3)),
            array(array('o', 't', 'tr'), array(1 => 'o', 2 => 't', 3 => 'tr'))
        ));
    }
}
