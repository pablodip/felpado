<?php

namespace felpado\tests;

class get_inTest extends felpadoTestCase
{
    /**
     * @dataProvider getInProvider
     */
    public function testGetInShouldReturnAValueIn($collection)
    {
        $this->assertSame(3, $this->callFunction($collection, array('foo')));
        $this->assertSame(6, $this->callFunction($collection, array('bar', 'two')));
        $this->assertSame(4, $this->callFunction($collection, array('bar', 'one', 'ups')));
        $this->assertSame(array('ups' => 4), $this->callFunction($collection, array('bar', 'one')));
    }

    /**
     * @dataProvider getInProvider
     */
    public function testGetInShouldReturnNullIfTheInDoesNotExistAndThereIsNoDefault($collection)
    {
        $this->assertNull($this->callFunction($collection, array('no')));
        $this->assertNull($this->callFunction($collection, array('bar', 'no')));
    }

    /**
     * @dataProvider getInProvider
     */
    public function testGetShouldReturnTheDefaultIfTheKeyDoesNotExist($collection)
    {
        $this->assertSame(10, $this->callFunction($collection, array('no'), 10));
        $this->assertSame(1, $this->callFunction($collection, array('bar', 'no'), 1));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider getInProvider
     */
    public function testGetShouldShouldThrowAnExceptionIfAnyDepthIsNotAnArray($collection)
    {
        $this->callFunction($collection, array('foo', 'two', 'ups'));
    }

    public function getInProvider()
    {
        return $this->collectionDataProvider(array(
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