<?php

namespace felpado\tests;

class constructTest extends felpadoTestCase
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
        return $this->collProvider(array(4, 5, 6));
    }
}
