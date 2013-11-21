<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class dissocTest extends FunctionTestCase
{
    /**
     * @dataProvider dissocProvider
     */
    public function testAssoc($collection)
    {
        $this->assertSame(array(
            'foo' => 3,
            'ups' => 5,
        ), $this->callFunction($collection, 'bar'));
    }

    public function dissocProvider()
    {
        return $this->collectionDataProvider(array(
            'foo' => 3,
            'bar' => 9,
            'ups' => 5,
        ));
    }
}