<?php

namespace felpado\tests;

use felpado as f;

class assoc_inTest extends felpadoTestCase
{
    /**
     * @dataProvider providerAssocIn
     */
    public function testItShouldCreateTheDepth($coll)
    {
        $expected = array(
            'foo' => 3,
            'bar' => array(
                'ups' => array(
                    'in' => 5
                )
            ),
        );
        $this->assertSame($expected, f\assoc_in($coll, array('bar', 'ups', 'in'), 5));
    }

    /**
     * @dataProvider providerAssocIn
     * @expectedException \LogicException
     */
    public function testItShouldThrowALogicExceptionWhenTheInPathAlreadyExistsAndItIsNotAnArray($coll)
    {
        f\assoc_in($coll, array('foo', 'bar'), 5);
    }

    /**
     * @dataProvider providerAssocIn
     */
    public function testItShouldDoNothingWithAnEmptyIn($coll)
    {
        $this->assertSame(f\to_array($coll), f\assoc_in($coll, array(), 'bar'));
    }

    public function providerAssocIn()
    {
        return $this->collProvider(array(
            'foo' => 3
        ));
    }
}
