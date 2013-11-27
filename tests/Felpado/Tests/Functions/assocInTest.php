<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class assocInTest extends FunctionTestCase
{
    /**
     * @dataProvider assocInProvider
     */
    public function testAssocInShouldCreateTheDepth($collection)
    {
        $this->assertSame(array(
            'foo' => 3,
            'bar' => array(
                'ups' => array(
                    'in' => 5
                )
            ),
        ), $this->callFunction($collection, array('bar', 'ups', 'in'), 5));
    }

    /**
     * @dataProvider assocInProvider
     * @expectedException \LogicException
     */
    public function testAssocInShouldThrowALogicExceptionWhenTheInPathAlreadyExistsAndItIsNotACollection($collection)
    {
        $this->callFunction($collection, array('foo', 'bar'), 5);
    }

    public function testEmptyIn()
    {
        $array = array('foo' => 3);

        $this->assertSame($array, $this->callFunction($array, array(), 'bar'));
    }

    public function assocInProvider()
    {
        return $this->collectionDataProvider(array(
            'foo' => 3
        ));
    }
}