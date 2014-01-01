<?php

namespace felpado\tests;

use felpado as f;

class someTest extends felpadoTestCase
{
    /**
     * @dataProvider provideSome
     */
    public function testSome($exp, $coll, $fn)
    {
        $this->assertSame($exp, f\some($fn, $coll));
    }

    public function provideSome()
    {
        $even = function ($v) { return $v % 2 === 0; };

        return $this->buildExpectedCollArgsProvider(array(
            array(false, array(), function () { return true; }),
            array(false, array(1, 3, 5), $even),
            array(true, array(1, 2, 3), $even),
            array(true, array(1, 2, 3, 4, 5), $even),
            array(true, array(2, 4, 6), $even)
        ));
    }
}
