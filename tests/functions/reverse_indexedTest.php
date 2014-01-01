<?php

namespace felpado\tests;

use felpado as f;

class reverse_indexedTest extends felpadoTestCase
{
    /**
     * @dataProvider provideReverseIndexed
     */
    public function testIndexed($exp, $coll)
    {
        $this->assertSame($exp, f\reverse_indexed($coll));
    }

    public function provideReverseIndexed()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(), array()),
            array(array('c' => 3, 'b' => 2, 'a' => 1), array('a' => 1, 'b' => 2, 'c' => 3))
        ));
    }
}
