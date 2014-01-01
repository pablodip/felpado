<?php

namespace felpado\tests;

use felpado as f;

class to_arrayTest extends felpadoTestCase
{
    /**
     * @dataProvider provideToArray
     */
    public function testIt($exp, $coll)
    {
        $this->assertSame($exp, f\to_array($coll));
    }

    public function provideToArray()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(), array()),
            array(array(1, 2, 3), array(1, 2, 3))
        ));
    }

    /**
     * @dataProvider invalidValueProvider
     * @expectedException \InvalidArgumentException
     */
    public function testInvalid($value)
    {
        f\to_array($value);
    }

    public function invalidValueProvider()
    {
        return array(
            array(1),
            array(1.1),
            array(true),
            array('string'),
            array(new \DateTime()),
        );
    }
}
