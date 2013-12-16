<?php

namespace felpado\tests;

class assocTest extends felpadoTestCase
{
    /**
     * @dataProvider assocProvider
     */
    public function testAssoc($collection)
    {
        $this->assertSame(array(
            'foo' => 3,
            'bar' => 9,
            'ups' => 5,
        ), $this->callFunction($collection, 'ups', 5));
    }

    public function assocProvider()
    {
        return $this->collectionDataProvider(array(
            'foo' => 3,
            'bar' => 9,
        ));
    }
}