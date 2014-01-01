<?php

namespace felpado\tests;

use felpado as f;

class reduceTest extends felpadoTestCase
{
    /**
     * @dataProvider reduceProvider
     */
    public function testReduce($coll)
    {
        $calls = array();
        $result = f\reduce(function ($result, $value) use(&$calls) {
            $calls[] = func_get_args();

            return $result + $value;
        }, $coll);

        $this->assertSame(6, $result);
        $expected = array(
            array(1, 2, 1),
            array(3, 3, 2),
        );
        $this->assertSame($expected, $calls);
    }

    /**
     * @dataProvider reduceProvider
     */
    public function testReduceWithInitialValue($coll)
    {
        $calls = array();
        $result = f\reduce(function ($result, $value) use(&$calls) {
            $calls[] = func_get_args();

            return $result + $value;
        }, $coll, 5);

        $this->assertSame(11, $result);
        $expected = array(
            array(5, 1, 0),
            array(6, 2, 1),
            array(8, 3, 2),
        );
        $this->assertSame($expected, $calls);
    }

    public function reduceProvider()
    {
        return $this->provideColl(array(1, 2, 3));
    }

    /**
     * @dataProvider provideReduceOneItem
     */
    public function testOneItemCollection($coll)
    {
        $calls = array();
        $result = f\reduce(function ($result, $value) use(&$calls) {
            $calls[] = func_get_args();

            return $result + $value;
        }, $coll);

        $this->assertSame(2, $result);
        $expected = array();
        $this->assertSame($expected, $calls);
    }

    /**
     * @dataProvider provideReduceOneItem
     */
    public function testOneItemCollectionWithInitialValue($coll)
    {
        $calls = array();
        $result = f\reduce(function ($result, $value) use(&$calls) {
            $calls[] = func_get_args();

            return $result + $value;
        }, $coll, 6);

        $this->assertSame(8, $result);
        $expected = array(
            array(6, 2, 0),
        );
        $this->assertSame($expected, $calls);
    }

    public function provideReduceOneItem()
    {
        return $this->provideColl(array(2));
    }
}
