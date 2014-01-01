<?php

namespace felpado\tests;

use felpado as f;

class restTest extends felpadoTestCase
{
    /**
     * @dataProvider provideRest
     */
    public function testIndexedCollection($expected, $coll)
    {
        $this->assertSame($expected, f\rest($coll));
    }

    public function provideRest()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(), array()),
            array(array(2, 3, 4), range(1, 4))
        ));
    }
}
