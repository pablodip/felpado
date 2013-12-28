<?php

namespace felpado\tests;

use felpado as f;

class map_indexedTest extends felpadoTestCase
{
    /**
     * @dataProvider provideMapIndexed
     */
    public function testMapIndexed($expected, $coll, $fn)
    {
        $this->assertSame($expected, f\map_indexed($fn, $coll));
    }

    public function provideMapIndexed()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(), array(), 'felpado\identity'),
            array(array('a' => 1.5, 'b' => 2.5), array('a' => 1, 'b' => 2), function ($v) { return $v + .5; })
        ));
    }
}
