<?php

namespace felpado\tests;

use felpado as f;

class conjoinTest extends felpadoTestCase
{
    /**
     * @dataProvider providerConjoin
     */
    public function testConjoin($coll)
    {
        $this->assertSame(array(2, 3, 5), f\conjoin($coll, 5));
    }

    public function providerConjoin()
    {
        return $this->collProvider(array(2, 3));
    }
}
