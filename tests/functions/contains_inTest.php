<?php

namespace felpado\tests;

use felpado as f;

class contains_inTest extends felpadoTestCase
{
    /**
     * @dataProvider provideContainsIn
     */
    public function testContainsInInShouldReturnTrueIfTheInExists($coll)
    {
        $this->assertTrue(f\contains_in($coll, array('foo')));
        $this->assertTrue(f\contains_in($coll, array('bar', 'two')));
        $this->assertTrue(f\contains_in($coll, array('bar', 'one', 'ups')));
        $this->assertTrue(f\contains_in($coll, array('bar', 'one')));
    }

    /**
     * @dataProvider provideContainsIn
     */
    public function testContainsInInShouldReturnFalseIfTheInNotExists($coll)
    {
        $this->assertFalse(f\contains_in($coll, array('no')));
        $this->assertFalse(f\contains_in($coll, array('bar', 'no')));
        $this->assertFalse(f\contains_in($coll, array('bar', 'no', 'no')));
        $this->assertFalse(f\contains_in($coll, array('bar', 'one', 'no')));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider provideContainsIn
     */
    public function testContainsInShouldShouldThrowAnExceptionIfAnyDepthIsNotAnArray($coll)
    {
        f\contains_in($coll, array('foo', 'two', 'ups'));
    }

    public function provideContainsIn()
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
