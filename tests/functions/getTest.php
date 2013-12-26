<?php

namespace felpado\tests;

use felpado as f;

class getTest extends felpadoTestCase
{
    /**
     * @dataProvider provideGet
     */
    public function testGetReturnsTheKeyValue($collection)
    {
        $this->assertSame(3, f\get($collection, 'foo'));
        $this->assertSame(9, f\get($collection, 'bar'));
    }

    /**
     * @dataProvider provideGet
     * @expectedException \InvalidArgumentException
     */
    public function testGetThrowsAnExceptionIfTheCollectionDoesNotContainTheKey($coll)
    {
        $this->assertSame(10, f\get($coll, 'no'));
    }

    public function provideGet()
    {
        return $this->provideColl(array(
            'foo' => 3,
            'bar' => 9,
        ));
    }
}
