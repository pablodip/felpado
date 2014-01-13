<?php

namespace felpado\tests;

use felpado as f;

class joinTest extends felpadoTestCase
{
    /**
     * @dataProvider provideJoin
     */
    public function testJoin($exp, $coll)
    {
        $this->assertSame($exp, f\join($coll));
    }

    public function provideJoin()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array('123', array(1, 2, 3))
        ));
    }

    /**
     * @dataProvider provideJoinWithSeparator
     */
    public function testJoinSeparator($exp, $coll, $sep)
    {
        $this->assertSame($exp, f\join($sep, $coll));
    }

    public function provideJoinWithSeparator()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array('1, 2, 3', array(1, 2, 3), ', ')
        ));
    }
}
