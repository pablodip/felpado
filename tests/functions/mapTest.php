<?php

namespace felpado\tests;

use felpado as f;

class mapTest extends felpadoTestCase
{
    /**
     * @dataProvider provideMap
     */
    public function testMap($exp, $coll, $fn)
    {
        $this->assertSame($exp, f\map($fn, $coll));
    }

    public function provideMap()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(2, 4, 6), array(1, 2, 3), function ($v) { return $v * 2; })
        ));
    }
}
