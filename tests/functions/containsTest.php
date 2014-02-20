<?php

namespace felpado\tests;

use felpado as f;

class containsTest extends felpadoTestCase
{
    public function testExists()
    {
        $coll = array(1 => 'one', 2 => 'two');

        $this->assertTrue(f\contains($coll, 1));
        $this->assertTrue(f\contains($coll, 2));
    }

    public function testExistsStrict()
    {
        $coll = array(1 => 'one', 2 => 'two');

        $this->assertFalse(f\contains($coll, '1'));
        $this->assertFalse(f\contains($coll, '2'));
    }

    public function testNotExists()
    {
        $coll = array(1 => 'one', 2 => 'two');

        $this->assertFalse(f\contains($coll, 3));
        $this->assertFalse(f\contains($coll, 4));
    }
}
