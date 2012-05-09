<?php

namespace Felpado\Tests;

class group_byTest extends FunctionTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testGroupBy($collection)
    {
        $this->assertSame(array(
            'integer' => array(4, 5),
            'string'  => array('foo', 'bar'),
        ), $this->callFunction('gettype', $collection));
    }

    /**
     * @dataProvider emptyCollectionProvider
     */
    public function testEmptyCollection($collection)
    {
        $this->assertSame(array(), $this->callFunction('gettype', $collection));
    }
}