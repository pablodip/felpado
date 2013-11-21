<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class constructTest extends FunctionTestCase
{
    /**
     * @dataProvider constructCollectionProvider
     */
    public function testConstruct($collection)
    {
        $this->assertSame(array(2, 4, 5, 6), $this->callFunction(2, $collection));
    }

    public function constructCollectionProvider()
    {
        return $this->collectionDataProvider(array(4, 5, 6));
    }
}