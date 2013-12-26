<?php

namespace felpado\tests;

class group_byTest extends felpadoTestCase
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
     * @dataProvider provideEmptyColl
     */
    public function testEmptyCollection($collection)
    {
        $this->assertSame(array(), $this->callFunction('gettype', $collection));
    }
}
