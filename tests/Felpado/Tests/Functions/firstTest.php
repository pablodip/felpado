<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

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