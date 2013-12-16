<?php

namespace felpado\tests;

class dissocTest extends felpadoTestCase
{
    /**
     * @dataProvider dissocProvider
     */
    public function testAssoc($collection)
    {
        $this->assertSame(array(
            'foo' => 3,
            'ups' => 5,
        ), $this->callFunction($collection, 'bar'));
    }

    public function dissocProvider()
    {
        return $this->collProvider(array(
            'foo' => 3,
            'bar' => 9,
            'ups' => 5,
        ));
    }
}
