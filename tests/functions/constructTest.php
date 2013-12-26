<?php

namespace felpado\tests;

use felpado as f;

class constructTest extends felpadoTestCase
{
    /**
     * @dataProvider provideConstruct
     */
    public function testConstruct($coll)
    {
        $this->assertSame(array(2, 4, 5, 6), f\construct(2, $coll));
    }

    public function provideConstruct()
    {
        return $this->provideColl(array(4, 5, 6));
    }
}
