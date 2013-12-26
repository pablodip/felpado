<?php

namespace felpado\tests;

use felpado as f;

class get_inTest extends felpadoTestCase
{
    /**
     * @dataProvider provideGetIn
     */
    public function testGetInShouldReturnAValueIn($coll)
    {
        $this->assertSame(3, f\get_in($coll, array('foo')));
        $this->assertSame(6, f\get_in($coll, array('bar', 'two')));
        $this->assertSame(4, f\get_in($coll, array('bar', 'one', 'ups')));
        $this->assertSame(array('ups' => 4), f\get_in($coll, array('bar', 'one')));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider provideGetIn
     */
    public function testGetInShouldThrowAnExceptionIfTheInDoesNotExist($coll)
    {
        f\get_in($coll, array('no'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider provideGetIn
     */
    public function testGetInShouldThrowAnExceptionIfAnyDepthIsNotAnArray($coll)
    {
        f\get_in($coll, array('foo', 'two', 'ups'));
    }

    public function provideGetIn()
    {
        return $this->provideColl(array(
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
