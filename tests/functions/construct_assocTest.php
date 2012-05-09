<?php

namespace Felpado\Tests;

class construct_assocTest extends FunctionTestCase
{
    /**
     * @dataProvider constructCollectionProvider
     */
    public function testConstructAssoc($collection)
    {
        $this->assertSame(array(
            'ups' => 5,
            'foo' => 3,
            'bar' => 9,
        ), $this->callFunction('ups', 5, $collection));
    }

    public function constructCollectionProvider()
    {
        return $this->collectionDataProvider(array('foo' => 3, 'bar' => 9));
    }
}