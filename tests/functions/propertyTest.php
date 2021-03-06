<?php

namespace felpado\tests;

use felpado as f;

class propertyTest extends felpadoTestCase
{
    /**
     * @dataProvider propertyNameProvider
     */
    public function testProperty($name)
    {
        $object = new propertyTestClass();
        $property = f\property($name);

        $this->assertSame($object->$name, $property($object));
    }

    public function propertyNameProvider()
    {
        return array(
            array('name'),
            array('type'),
        );
    }
}

class propertyTestClass
{
    public $name = 'foo';
    public $type = 'bar';
}
