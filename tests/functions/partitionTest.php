<?php

namespace felpado\tests;

use felpado as f;

class partitionTest extends felpadoTestCase
{
    /**
     * @dataProvider providePartition
     */
    public function testPartition($exp, $coll, $n)
    {
        $this->assertSame($exp, f\partition($n, $coll));
    }

    public function providePartition()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(array(1, 2, 3), array(4, 5, 6)), range(1, 6), 3),
            array(array(array(1, 2), array(3, 4), array(5, 6)), range(1, 6), 2),
        ));
    }
}
