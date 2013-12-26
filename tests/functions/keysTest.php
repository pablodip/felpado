<?php

namespace felpado\tests;

class keysTest extends felpadoTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testIndexedCollection($collection)
    {
        $this->assertSame(array(0, 1, 2, 3), $this->callFunction($collection));
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testAssociativeCollection($collection)
    {
        $this->assertSame(array(
            'one',
            'two',
            4,
            5,
        ), $this->callFunction($collection));
    }

    /**
     * @dataProvider provideEmptyColl
     */
    public function testEmptyCollection($collection)
    {
        $this->assertSame(array(), $this->callFunction($collection));
    }
}
