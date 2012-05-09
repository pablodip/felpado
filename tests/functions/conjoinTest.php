<?php

namespace Felpado\Tests;

class conjoinTest extends FunctionTestCase
{
    public function testConjoin()
    {
        $this->assertSame(array(2, 3, 5), $this->callFunction(array(2, 3), 5));
    }
}