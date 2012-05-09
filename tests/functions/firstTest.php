<?php

namespace Felpado\Tests;

class firstTest extends FunctionTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testFirst($collection)
    {
        $this->assertSame(4, $this->callFunction($collection));
    }
}