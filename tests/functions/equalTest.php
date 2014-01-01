<?php

namespace felpado\tests;

use felpado as f;

class equalTest extends felpadoTestCase
{
    /**
     * @dataProvider provideEqual
     */
    public function testIt($exp, $values)
    {
        $this->assertSame($exp, call_user_func_array('felpado\equal', $values));
    }

    public function provideEqual()
    {
        return array(
            array(true, array(1, 1)),
            array(true, array(1, 1, 1)),
            array(false, array(1, 2)),
            array(false, array(1, 1, 2)),
        );
    }
}
