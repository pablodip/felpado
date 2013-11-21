<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class filterTest extends FunctionTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testFilter($collection)
    {
        $calls = array();
        $result = $this->callFunction(function ($value, $key) use(&$calls) {
            $calls[] = func_get_args();

            return is_int($value);
        }, $collection);

        $expected = array(
            0 => 4,
            1 => 5,
        );
        $this->assertSame($expected, $result);
        $expected = array(
            array(4, 0),
            array(5, 1),
            array('foo', 2),
            array('bar', 3),
        );
        $this->assertSame($expected, $calls);
    }
}