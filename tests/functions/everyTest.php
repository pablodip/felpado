<?php

namespace felpado\tests;

use felpado as f;

class everyTest extends felpadoTestCase
{
    /**
     * @dataProvider provideEvery
     */
    public function testAllTrue($coll)
    {
        $this->assertTrue(f\every('is_scalar', $coll));
        $this->assertFalse(f\every('is_string', $coll));
        $this->assertFalse(f\every('is_object', $coll));
    }

    public function provideEvery()
    {
        return $this->provideColl(array(1, 2, 'three'));
    }
}
