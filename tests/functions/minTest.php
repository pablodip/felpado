<?php

namespace Felpado\Tests;

class minTest extends FunctionTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testMinimum($collection)
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
        return $this->collectionDataProvider(array(
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