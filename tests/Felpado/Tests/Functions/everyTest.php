<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class everyTest extends FunctionTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testAllTrue($collection)
    {
        $this->assertTrue($this->callFunction('is_scalar', $collection));
    }

    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testSomeTrue($collection)
    {
        $this->assertFalse($this->callFunction('is_string', $collection));
    }

    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testNoneTrue($collection)
    {
        $this->assertFalse($this->callFunction('is_object', $collection));
    }
}