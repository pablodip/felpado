<?php

namespace Felpado\Tests;

class conjoinTest extends FunctionTestCase
{
    /**
     * @dataProvider conjoinProvider
     */
    public function testConjoin($collection)
    {
        $this->assertSame(array(2, 3, 5), $this->callFunction($collection, 5));
    }

    public function conjoinProvider()
    {
        return $this->collectionDataProvider(array(2, 3));
    }
}