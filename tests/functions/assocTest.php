<?php

namespace felpado\tests;

use felpado as f;

class assocTest extends felpadoTestCase
{
    /**
     * @dataProvider provideAssoc
     */
    public function testAssoc($expected, $coll, $key, $value)
    {
        $this->assertSame($expected, f\assoc($coll, $key, $value));
    }

    public function provideAssoc()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array('a' => 'b'), array(), 'a', 'b'),
            array(array('a' => 'b', 'c' => 'd'), array('a' => 'b'), 'c', 'd'),
            array(array('foo' => 'ups'), array('foo' => 'bar'), 'foo', 'ups'),
        ));
    }
}
