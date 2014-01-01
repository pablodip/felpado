<?php

namespace felpado\tests;

class identicalTest extends felpadoTestCase
{
    /**
     * @dataProvider provideIdentical
     */
    public function testIt($exp, $values)
    {
        $this->assertSame($exp, call_user_func_array('felpado\identical', $values));
    }

    public function provideIdentical()
    {
        $object = new \ArrayObject();

        return array(
            array(true, array(1, 1)),
            array(true, array(1, 1, 1)),
            array(false, array(1, 2)),
            array(false, array(1, 1, 2)),
            array(true, array($object, $object)),
            array(false, array($object, new \ArrayObject())),
            array(false, array($object, $object, new \ArrayObject()))
        );
    }
}
