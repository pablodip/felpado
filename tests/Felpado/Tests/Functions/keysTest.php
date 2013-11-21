<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class keysTest extends FunctionTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testIndexedCollection($collection)
    {
        $this->assertSame(array(0, 1, 2, 3), $this->callFunction($collection));
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testAssociativeCollection($collection)
    {
        $this->assertSame(array(
            'one',
            'two',
            4,
            5,
        ), $this->callFunction($collection));
    }

    /**
     * @dataProvider emptyCollectionProvider
     */
    public function testEmptyCollection($collection)
    {
        $this->assertSame(array(), $this->callFunction($collection));
    }
}