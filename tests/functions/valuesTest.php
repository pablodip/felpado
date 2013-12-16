<?php

namespace felpado\tests;

class valuesTest extends felpadoTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testIndexedCollection($collection)
    {
        $this->assertSame(array(
            4,
            5,
            'foo',
            'bar',
        ), $this->callFunction($collection));
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testAssociativeCollection($collection)
    {
        $this->assertSame(array(
            1,
            2,
            'four',
            'five',
        ), $this->callFunction($collection));
    }

    /**
     * @dataProvider emptyCollectionProvider
     */
    public function testEmptyCollection($collection)
    {
        $this->assertSame(array(), $this->callFunction($collection));
    }
}