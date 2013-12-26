<?php

namespace felpado\tests;

class lastTest extends felpadoTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function test1($collection)
    {
        $this->assertSame('bar', $this->callFunction($collection));
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function test2($collection)
    {
        $this->assertSame('five', $this->callFunction($collection));
    }

    /**
     * @dataProvider provideEmptyColl
     */
    public function testEmptyCollection($collection)
    {
        $this->assertNull(null, $this->callFunction($collection));
    }
}
