<?php

namespace felpado\tests;

use felpado as f;

class drop_lastTest extends felpadoTestCase
{
    public function testIndexed()
    {
        $this->assertSame(array('one', 'two'), f\drop_last(array('one', 'two', 'three')));
    }

    public function testAssociative()
    {
        $this->assertSame(array(1 => 'o', 2 => 't'), f\drop_last(array(1 => 'o', 2 => 't', 3 => 'th')));
    }

    /**
     * @dataProvider provideEmptyColl
     */
    public function testEmptyCollection($collection)
    {
        $this->assertSame(array(), $this->callFunction($collection));
    }
}
