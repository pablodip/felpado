<?php

namespace felpado\tests;

use felpado as f;

class identityTest extends felpadoTestCase
{
    /**
     * @dataProvider provideIdentity
     */
    public function testIdentity($expected, $value)
    {
        $this->assertSame($expected, f\identity($value));
    }

    public function provideIdentity()
    {
        $obj = new \stdClass();

        return array(
            array(null, null),
            array(true, true),
            array(false, false),
            array('a', 'a'),
            array(1, 1),
            array($obj, $obj)
        );
    }
}
