<?php

namespace felpado\tests;

class someTest extends felpadoTestCase
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
        $this->assertTrue($this->callFunction('is_string', $collection));
    }

    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testNoneTrue($collection)
    {
        $this->assertFalse($this->callFunction('is_object', $collection));
    }
}