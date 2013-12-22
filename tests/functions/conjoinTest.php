<?php

namespace felpado\tests;

use felpado as f;

class conjoinTest extends felpadoTestCase
{
    /**
     * @dataProvider provideConjoin
     */
    public function testConjoin($coll)
    {
        $this->assertSame(array(2, 3, 5), f\conjoin($coll, 5));
    }

    public function provideConjoin()
    {
        return $this->collProvider(array(2, 3));
    }
}
