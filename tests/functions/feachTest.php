<?php

namespace Felpado\Tests;

class feachTest extends FunctionTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testFeach($collection)
    {
        $calls = array();
        $this->callFunction(function () use(&$calls) {
            $calls[] = func_get_args();
        }, $collection);

        $expected = array(
            array(4, 0),
            array(5, 1),
            array('foo', 2),
            array('bar', 3),
        );
        $this->assertSame($expected, $calls);
    }
}