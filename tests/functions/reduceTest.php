<?php

namespace felpado\tests;

class reduceTest extends felpadoTestCase
{
    /**
     * @dataProvider reduceProvider
     */
    public function testReduce($collection)
    {
        $calls = array();
        $result = $this->callFunction(function ($result, $value) use(&$calls) {
            $calls[] = func_get_args();

            return $result + $value;
        }, $collection);

        $this->assertSame(6, $result);
        $expected = array(
            array(1, 2),
            array(3, 3),
        );
        $this->assertSame($expected, $calls);
    }

    /**
     * @dataProvider reduceProvider
     */
    public function testReduceWithInitialValue($collection)
    {
        $calls = array();
        $result = $this->callFunction(function ($result, $value) use(&$calls) {
            $calls[] = func_get_args();

            return $result + $value;
        }, $collection, 5);

        $this->assertSame(11, $result);
        $expected = array(
            array(5, 1),
            array(6, 2),
            array(8, 3),
        );
        $this->assertSame($expected, $calls);
    }

    public function reduceProvider()
    {
        return $this->collectionDataProvider(array(1, 2, 3));
    }

    /**
     * @dataProvider oneItemCollectionProvider
     */
    public function testOneItemCollection($collection)
    {
        $calls = array();
        $result = $this->callFunction(function ($result, $value) use(&$calls) {
            $calls[] = func_get_args();

            return $result + $value;
        }, $collection);

        $this->assertSame(2, $result);
        $expected = array();
        $this->assertSame($expected, $calls);
    }

    /**
     * @dataProvider oneItemCollectionProvider
     */
    public function testOneItemCollectionWithInitialValue($collection)
    {
        $calls = array();
        $result = $this->callFunction(function ($result, $value) use(&$calls) {
            $calls[] = func_get_args();

            return $result + $value;
        }, $collection, 6);

        $this->assertSame(8, $result);
        $expected = array(
            array(6, 2),
        );
        $this->assertSame($expected, $calls);
    }
}