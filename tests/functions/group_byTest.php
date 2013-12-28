<?php

namespace felpado\tests;

use felpado as f;

class group_byTest extends felpadoTestCase
{
    /**
     * @dataProvider provideGroupBy
     */
    public function testGroupBy($expected, $coll, $fn)
    {
        $this->assertSame($expected, f\group_by($fn, $coll));
    }

    public function provideGroupBy()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(3 => array('one', 'two'), 5 => array('three')), array('one', 'two', 'three'), 'strlen')
        ));
    }

    /**
     * @dataProvider provideEmptyColl
     */
    public function testEmptyCollection($coll)
    {
        $this->assertSame(array(), f\group_by('gettype', $coll));
    }
}
