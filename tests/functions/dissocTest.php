<?php

namespace felpado\tests;

use felpado as f;

class dissocTest extends felpadoTestCase
{
    /**
     * @dataProvider dissocProvider
     */
    public function testAssoc($coll)
    {
        $this->assertSame(array(1 => 'o', 3 => 'tr'), f\dissoc($coll, 2));
        $this->assertSame(array(1 => 'o', 2 => 't'), f\dissoc($coll, 3));
    }

    public function dissocProvider()
    {
        return $this->provideColl(array(
            1 => 'o',
            2 => 't',
            3 => 'tr'
        ));
    }
}
