<?php

namespace felpado\tests;

class reverseTest extends felpadoTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testIndexed($collection)
    {
        $this->assertSame(array(
            3 => 'bar',
            2 => 'foo',
            1 => 5,
            0 => 4,
        ), $this->callFunction($collection));
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testAssociative($collection)
    {
        $this->assertSame(array(
            5     => 'five',
            4     => 'four',
            'two' => 2,
            'one' => 1,
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