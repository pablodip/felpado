<?php

namespace felpado\tests;

use felpado as f;

class get_in_orTest extends felpadoTestCase
{
    /**
     * @dataProvider provideGetInOr
     */
    public function testGetInShouldReturnAValueIn($coll)
    {
        $this->assertSame(3, f\get_in_or($coll, array('foo'), 1));
        $this->assertSame(6, f\get_in_or($coll, array('bar', 'two'), 2));
        $this->assertSame(4, f\get_in_or($coll, array('bar', 'one', 'ups'), 3));
        $this->assertSame(array('ups' => 4), f\get_in_or($coll, array('bar', 'one'), 4));
    }

    /**
     * @dataProvider provideGetInOr
     */
    public function testGetShouldReturnTheDefaultIfTheKeyDoesNotExist($coll)
    {
        $this->assertSame(10, f\get_in_or($coll, array('no'), 10));
        $this->assertSame(1, f\get_in_or($coll, array('bar', 'no'), 1));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider provideGetInOr
     */
    public function testGetShouldShouldThrowAnExceptionIfAnyDepthIsNotAnArray($coll)
    {
        f\get_in_or($coll, array('foo', 'two', 'ups'), null);
    }

    public function provideGetInOr()
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
