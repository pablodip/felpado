<?php

namespace felpado\tests;

use felpado as f;

class minTest extends felpadoTestCase
{
    /**
     * @dataProvider provideMinWithoutFn
     */
    public function testMinWithoutFn($exp, $coll)
    {
        $this->assertSame($exp, f\min($coll));
    }

    public function provideMinWithoutFn()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(null, array()),
            array(1, array(1, 2, 3)),
            array('a', array('a', 'b', 'c'))
        ));
    }

    /**
     * @dataProvider provideMinWithFn
     */
    public function testMinWithFn($exp, $coll, $fn)
    {
        $this->assertSame($exp, f\min($coll, $fn));
    }

    public function provideMinWithFn()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(null, array(), 'felpado\identity'),
            array(array('age' => 10), array(array('age' => 10), array('age' => 20)), function ($v) { return $v['age']; })
        ));
    }
}
