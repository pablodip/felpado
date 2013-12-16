<?php

namespace felpado\tests;

class contains_strictTest extends felpadoTestCase
{
    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testExists($collection)
    {
        $this->assertTrue($this->callFunction($collection, 'one'));
        $this->assertTrue($this->callFunction($collection, 'two'));
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testExistsStrict($collection)
    {
        $this->assertFalse($this->callFunction($collection, '4'));
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testNotExists($collection)
    {
        $this->assertFalse($this->callFunction($collection, 'foo'));
        $this->assertFalse($this->callFunction($collection, 'four'));
    }
}