<?php

namespace felpado\tests;

use felpado as f;

class filter_indexedTest extends felpadoTestCase
{
    /**
     * @dataProvider provideFilterIndexed
     */
    public function testFilter($coll)
    {
        $calls = array();
        $result = f\filter_indexed(function ($v) use(&$calls) {
            $calls[] = func_get_args();

            return is_int($v);
        }, $coll);

        $this->assertSame(array(0 => 10, 2 => 30), $result);
        $this->assertSame(array(
            array(10, 0),
            array('20', 1),
            array(30, 2)
        ), $calls);
    }

    public function provideFilterIndexed()
    {
        return $this->provideColl(array(10, '20', 30));
    }
}
