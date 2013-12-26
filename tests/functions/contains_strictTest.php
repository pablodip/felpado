<?php

namespace felpado\tests;

use felpado as f;

class contains_strictTest extends felpadoTestCase
{
    public function testExists()
    {
        $coll = array(1 => 'one', 2 => 'two');

        $this->assertTrue(f\contains_strict($coll, 1));
        $this->assertTrue(f\contains_strict($coll, 2));
    }

    public function testExistsStrict()
    {
        $coll = array(1 => 'one', 2 => 'two');

        $this->assertFalse(f\contains_strict($coll, '1'));
        $this->assertFalse(f\contains_strict($coll, '2'));
    }

    public function testNotExists()
    {
        $coll = array(1 => 'one', 2 => 'two');

        $this->assertFalse(f\contains_strict($coll, 3));
        $this->assertFalse(f\contains_strict($coll, 4));
    }
}
