<?php

namespace felpado\tests;

use felpado as f;

class eachTest extends felpadoTestCase
{
    /**
     * @dataProvider provideEach
     */
    public function testEach($coll)
    {
        $calls = array();
        f\each(function () use(&$calls) {
            $calls[] = func_get_args();
        }, $coll);

        $expected = array(
            array('o', 1),
            array('t', 2),
            array('th', 3)
        );
        $this->assertSame($expected, $calls);
    }

    public function provideEach()
    {
        return $this->provideColl(array(1 => 'o', 2 => 't', 3 => 'th'));
    }
}
