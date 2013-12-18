<?php

namespace felpado\tests;

class to_arrayTest extends felpadoTestCase
{
    public function testArray()
    {
        $array = array(1, 2, 3);
        $this->assertSame($array, $this->callFunction($array));
    }

    public function testTraversable()
    {
        $array = array(1, 2, 3);
        $this->assertSame($array, $this->callFunction(new \ArrayObject($array)));
    }

    /**
     * @dataProvider invalidValueProvider
     * @expectedException InvalidArgumentException
     */
    public function testInvalid($value)
    {
        $this->callFunction($value);
    }

    public function invalidValueProvider()
    {
        return array(
            array(1),
            array(1.1),
            array(true),
            array('string'),
            array(new \DateTime()),
        );
    }
}
