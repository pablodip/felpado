<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class dropLastTest extends FunctionTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testIndexed($collection)
    {
        $this->assertSame(array(
            4,
            5,
            'foo',
            //'bar',
        ), $this->callFunction($collection));
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testAssociative($collection)
    {
        $this->assertSame(array(
            'one' => 1,
            'two' => 2,
            4     => 'four',
            //5     => 'five',
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