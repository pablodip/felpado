<?php

namespace felpado\tests;

use felpado as f;

class keysTest extends felpadoTestCase
{
    /**
     * @dataProvider provideKeys
     */
    public function testIndexedCollection($coll)
    {
        $this->assertSame(array('o', 't', 3), f\keys($coll));
    }

    public function provideKeys()
    {
        return $this->provideColl(array(
            'o' => 1,
            't' => 2,
            3 => 'three'
        ));
    }

    /**
     * @dataProvider provideEmptyColl
     */
    public function testEmptyCollection($collection)
    {
        $this->assertSame(array(), f\keys($collection));
    }
}
