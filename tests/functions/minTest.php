<?php

namespace felpado\tests;

class minTest extends felpadoTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testMin($collection)
    {
        $this->assertSame('bar', $this->callFunction($collection));
    }

    /**
     * @dataProvider withCallbackCollectionProvider
     */
    public function testWithCallback($collection)
    {
        $callback = function ($value) { return $value['age']; };
        $expected = array('name' => 'foo', 'age' => 20);

        $this->assertSame($expected, $this->callFunction($collection, $callback));
    }

    public function withCallbackCollectionProvider()
    {
        return $this->collProvider(array(
            array('name' => 'bar', 'age' => 50),
            array('name' => 'ups', 'age' => 40),
            array('name' => 'foo', 'age' => 20),
        ));
    }

    /**
     * @dataProvider oneItemCollectionProvider
     */
    public function testOneItemCollection($collection)
    {
        $this->assertSame(2, $this->callFunction($collection));
    }

    /**
     * @dataProvider emptyCollectionProvider
     */
    public function testEmptyCollection($collection)
    {
        $this->assertNull($this->callFunction($collection));
    }
}
