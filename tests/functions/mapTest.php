<?php

namespace felpado\tests;

class mapTest extends felpadoTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testIndexedCollection($collection)
    {
        $calls = $this->callFunction(function () {
            return func_get_args();
        }, $collection);

        $expected = array(
            0 => array(4, 0),
            1 => array(5, 1),
            2 => array('foo', 2),
            3 => array('bar', 3),
        );
        $this->assertSame($expected, $calls);
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testAssociativeCollection($collection)
    {
        $calls = $this->callFunction(function () {
            return func_get_args();
        }, $collection);

        $expected = array(
            'one' => array(1, 'one'),
            'two' => array(2, 'two'),
            4     => array('four', 4),
            5     => array('five', 5),
        );
        $this->assertSame($expected, $calls);
    }
}