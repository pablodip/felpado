<?php

namespace felpado\tests;

use felpado as f;

class findTest extends felpadoTestCase
{
    /**
     * @dataProvider provideFind
     */
    public function testFind($coll)
    {
        $calls = array();
        $result = f\find(function ($value) use(&$calls) {
            $calls[] = func_get_args();

            return $value % 2 === 0;
        }, $coll);

        $this->assertSame(2, $result);
        $this->assertSame(array(array(1), array(2)), $calls);
    }

    /**
     * @dataProvider provideFind
     */
    public function testNotMatch($coll)
    {
        $this->assertNull(f\find('is_object', $coll));
    }

    public function provideFind()
    {
        return $this->provideColl(array(1, 2, 3, 4));
    }

    /**
     * @dataProvider provideEmptyColl
     */
    public function testEmptyCollection($coll)
    {
        $calls = array();
        $result = f\find(function ($value) use(&$calls) {
            $calls[] = func_get_args();

            return is_string($value);
        }, $coll);

        $this->assertNull($result);
        $this->assertSame(array(), $calls);
    }
}
