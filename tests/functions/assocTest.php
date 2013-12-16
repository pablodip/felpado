<?php

namespace felpado\tests;

use felpado as f;

class assocTest extends felpadoTestCase
{
    /**
     * @dataProvider providerAssoc
     */
    public function testAssoc($coll)
    {
        $expected = array(
            'foo' => 'bar',
            'ups' => 'la'
        );
        $this->assertSame($expected, f\assoc($coll, 'ups', 'la'));
    }

    public function providerAssoc()
    {
        return $this->collProvider(array(
            'foo' => 'bar'
        ));
    }
}
