<?php

namespace felpado\tests;

class firstTest extends felpadoTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testFirst($collection)
    {
        $this->assertSame(4, $this->callFunction($collection));
    }
}
