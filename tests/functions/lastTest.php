<?php

namespace felpado\tests;

use felpado as f;

class lastTest extends felpadoTestCase
{
    /**
     * @dataProvider provideLast
     */
    public function testLast($expected, $coll)
    {
        $this->assertSame($expected, f\last($coll));
    }

    public function provideLast()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(3, array(1, 2, 3)),
            array(array('b', 'c'), array(true, 'a', array('b', 'c'))),
            array(null, array())
        ));
    }
}
