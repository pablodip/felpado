<?php

namespace felpado\tests;

use felpado as f;

class reverseTest extends felpadoTestCase
{
    /**
     * @dataProvider provideReverse
     */
    public function testIndexed($exp, $coll)
    {
        $this->assertSame($exp, f\reverse($coll));
    }

    public function provideReverse()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(), array()),
            array(array(3, 2, 1), array(1, 2, 3))
        ));
    }
}
