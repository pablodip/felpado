<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class propertyTest extends FunctionTestCase
{
    /**
     * @dataProvider propertyNameProvider
     */
    public function testProperty($name)
    {
        $object = new propertyTestClass();
        $property = $this->callFunction($name);

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