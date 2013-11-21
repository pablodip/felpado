<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class findTest extends FunctionTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testFind($collection)
    {
        $calls = array();
        $result = $this->callFunction(function ($value) use(&$calls) {
            $calls[] = func_get_args();

            return is_string($value);
        }, $collection);

        $this->assertSame('foo', $result);
        $expected = array(
            array(4),
            array(5),
            array('foo'),
        );
        $this->assertSame($expected, $calls);
    }

    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testNotMatch($collection)
    {
        $this->assertNull($this->callFunction('is_object', $collection));
    }

    /**
     * @dataProvider emptyCollectionProvider
     */
    public function testEmptyCollection($collection)
    {
        $calls = array();
        $result = $this->callFunction(function ($value) use(&$calls) {
            $calls[] = func_get_args();

            return is_string($value);
        }, $collection);

        $this->assertNull($result);
        $this->assertSame(array(), $calls);
    }
}