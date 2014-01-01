<?php

namespace felpado\tests;

use felpado as f;

class maxTest extends felpadoTestCase
{
    /**
     * @dataProvider provideMaxWithoutFn
     */
    public function testMaxWithoutFn($exp, $coll)
    {
        $this->assertSame($exp, f\max($coll));
    }

    public function provideMaxWithoutFn()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(null, array()),
            array(3, array(1, 2, 3)),
            array('c', array('a', 'b', 'c'))
        ));
    }

    /**
     * @dataProvider provideMaxWithFn
     */
    public function testMaxWithFn($exp, $coll, $fn)
    {
        $this->assertSame($exp, f\max($coll, $fn));
    }

    public function provideMaxWithFn()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(null, array(), 'felpado\identity'),
            array(array('age' => 20), array(array('age' => 10), array('age' => 20)), function ($v) { return $v['age']; })
        ));
    }
}
