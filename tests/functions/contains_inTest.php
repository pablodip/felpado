<?php

namespace felpado\tests;

class contains_inTest extends felpadoTestCase
{
    /**
     * @dataProvider containsInProvider
     */
    public function testContainsInInShouldReturnTrueIfTheInExists($collection)
    {
        $this->assertTrue($this->callFunction($collection, array('foo')));
        $this->assertTrue($this->callFunction($collection, array('bar', 'two')));
        $this->assertTrue($this->callFunction($collection, array('bar', 'one', 'ups')));
        $this->assertTrue($this->callFunction($collection, array('bar', 'one')));
    }

    /**
     * @dataProvider containsInProvider
     */
    public function testContainsInInShouldReturnFalseIfTheInNotExists($collection)
    {
        $this->assertFalse($this->callFunction($collection, array('no')));
        $this->assertFalse($this->callFunction($collection, array('bar', 'no')));
        $this->assertFalse($this->callFunction($collection, array('bar', 'no', 'no')));
        $this->assertFalse($this->callFunction($collection, array('bar', 'one', 'no')));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider containsInProvider
     */
    public function testContainsInShouldShouldThrowAnExceptionIfAnyDepthIsNotAnArray($collection)
    {
        $this->callFunction($collection, array('foo', 'two', 'ups'));
    }

    public function containsInProvider()
    {
        return $this->collProvider(array(
            'foo' => 3,
            'bar' => array(
                'one' => array(
                    'ups' => 4,
                ),
                'two' => 6
            )
        ));
    }
}
