<?php

namespace felpado\tests;

use felpado as f;

class rest_indexedTest extends felpadoTestCase
{
    /**
     * @dataProvider provideRestIndexed
     */
    public function testIndexedCollection($expected, $coll)
    {
        $this->assertSame($expected, f\rest_indexed($coll));
    }

    public function provideRestIndexed()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(), array()),
            array(array('b' => 2, 'c' => 3), array('a' => 1, 'b' => 2, 'c' => 3))
        ));
    }
}
