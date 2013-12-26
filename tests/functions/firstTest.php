<?php

namespace felpado\tests;

use felpado as f;

class firstTest extends felpadoTestCase
{
    public function testFirst()
    {
        $coll1 = range(2, 10);
        $this->assertSame(2, f\first($coll1));

        $coll2 = new \ArrayObject(array('a', 'b', 'c'));
        $this->assertSame('a', f\first($coll2));
    }
}
