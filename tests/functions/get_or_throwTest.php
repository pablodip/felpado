<?php

namespace felpado\tests;

use felpado as f;

class get_or_throwTest extends felpadoTestCase
{
    /**
     * @dataProvider provideGet
     */
    public function testGet($expected, $collection, $key)
    {
        $this->assertSame($expected, f\get_or_throw($collection, $key));
    }

    public function provideGet()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array('b', array('a' => 'b', 'c' => 'd'), 'a')
        ));
    }

    /**
     * @expectedException \Exception
     */
    public function testThrow()
    {
        f\get_or_throw(array('a' => 'b'), 'c');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowCustomException()
    {
        f\get_or_throw(array('a' => 'b'), 'c', 'InvalidArgumentException');
    }
}
