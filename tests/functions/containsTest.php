<?php

namespace felpado\tests;

use felpado as f;

class containsTest extends felpadoTestCase
{
    /**
     * @dataProvider provideContains
     */
    public function testExists($coll)
    {
        $this->assertTrue(f\contains($coll, 1));
        $this->assertTrue(f\contains($coll, 2));
    }

    /**
     * @dataProvider provideContains
     */
    public function testExistsNotStrict($coll)
    {
        $this->assertTrue(f\contains($coll, '1'));
    }

    /**
     * @dataProvider provideContains
     */
    public function testNotExists($coll)
    {
        $this->assertFalse(f\contains($coll, 3));
        $this->assertFalse(f\contains($coll, '4'));
    }

    public function provideContains()
    {
        return $this->collProvider(array(
            1 => true,
            2 => false
        ));
    }
}
