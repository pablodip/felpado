<?php

namespace Felpado\Tests;

class containsTest extends FunctionTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testExists($collection)
    {
        $this->assertTrue($this->callFunction($collection, 5));
    }

    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testExistsNotStrict($collection)
    {
        $this->assertTrue($this->callFunction($collection, '5'));
    }

    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testNotExists($collection)
    {
        $this->assertFalse($this->callFunction($collection, 'foobar'));
    }
}