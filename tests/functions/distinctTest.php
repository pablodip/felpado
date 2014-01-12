<?php

namespace felpado\tests;

use felpado as f;

class distinctTest extends felpadoTestCase
{
    /**
     * @dataProvider provideDistinct
     */
    public function testDistinct($exp, $coll)
    {
        $this->assertSame($exp, f\distinct($coll));
    }

    public function provideDistinct()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(1, 2, 3, 4, 5), array(1, 2, 3, 2, 4, 5, 3, 1))
        ));
    }
}
