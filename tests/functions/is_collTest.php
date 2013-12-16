<?php

namespace felpado\tests;

use felpado as f;

class is_collTest extends felpadoTestCase
{
    public function testIsColl()
    {
        $this->assertTrue(f\is_coll(array()));
        $this->assertTrue(f\is_coll(new \ArrayObject()));
        $this->assertFalse(f\is_coll(1));
        $this->assertFalse(f\is_coll(true));
        $this->assertFalse(f\is_coll('true'));
    }
}
