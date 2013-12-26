<?php

namespace felpado\tests;

use felpado as f;

class get_orTest extends felpadoTestCase
{
    /**
     * @dataProvider provideGet
     */
    public function testGetOrReturnsTheKeyValue($coll)
    {
        $this->assertSame(3, f\get_or($coll, 'foo', 1));
        $this->assertSame(9, f\get_or($coll, 'bar', 2));
    }

    /**
     * @dataProvider provideGet
     */
    public function testGetOrReturnsTheDefaultIfTheCollectionDoesNotContainTheKey($coll)
    {
        $this->assertSame(10, f\get_or($coll, 'no', 10));
        $this->assertNull(f\get_or($coll, 'ups', null));
    }

    public function provideGet()
    {
        return $this->provideColl(array(
            'foo' => 3,
            'bar' => 9,
        ));
    }
}
