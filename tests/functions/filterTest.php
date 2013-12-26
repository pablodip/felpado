<?php

namespace felpado\tests;

use felpado as f;

class filterTest extends felpadoTestCase
{
    /**
     * @dataProvider provideFilter
     */
    public function testFilter($coll)
    {
        $calls = array();
        $result = f\filter(function ($v) use(&$calls) {
            $calls[] = func_get_args();

            return is_int($v);
        }, $coll);

        $this->assertSame(array(10, 30), $result);
        $this->assertSame(array(array(10), array('20'), array(30)), $calls);
    }

    public function provideFilter()
    {
        return $this->provideColl(array(10, '20', 30));
    }
}
