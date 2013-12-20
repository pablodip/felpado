<?php

namespace felpado\tests;

use felpado as f;

class methodTest extends felpadoTestCase
{
    public function testMethod()
    {
        $object = new _MethodTesting();

        $a = f\method('a');
        $c = f\method('c');
        $cWithDE = f\method('c', 'd', 'e');

        $this->assertSame('b', $a($object));
        $this->assertSame(array(), $c($object));
        $this->assertSame(array('d', 'e'), $cWithDE($object));
    }
}

class _MethodTesting
{
    public function a()
    {
        return 'b';
    }

    public function c()
    {
        return func_get_args();
    }
}
