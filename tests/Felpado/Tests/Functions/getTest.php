<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class getTest extends FunctionTestCase
{
    /**
     * @dataProvider getProvider
     */
    public function testGetReturnsTheKeyValue($collection)
    {
        $this->assertSame(3, $this->callFunction($collection, 'foo'));
        $this->assertSame(9, $this->callFunction($collection, 'bar'));
    }

    /**
     * @dataProvider getProvider
     */
    public function testGetReturnsNullIfTheKeyDoesNotExistAndThereIsNoDefault($collection)
    {
        $this->assertNull($this->callFunction($collection, 'ups'));
    }

    /**
     * @dataProvider getProvider
     */
    public function testGetReturnsTheDefaultIfTheKeyDoesNotExist($collection)
    {
        $this->assertSame(10, $this->callFunction($collection, 'ups', 10));
    }

    public function getProvider()
    {
        return $this->collectionDataProvider(array(
            'foo' => 3,
            'bar' => 9,
        ));
    }
}