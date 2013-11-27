<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class assocInTest extends FunctionTestCase
{
    /**
     * @dataProvider assocDeepProvider
     */
    public function testAssocDeepShouldCreateTheDepth($collection)
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
     * @dataProvider assocDeepProvider
     * @expectedException \LogicException
     */
    public function testAssocDeepShouldThrowALogicExceptionWhenTheDepthPathAlreadyExistsAndItIsNotACollection($collection)
    {
        $this->callFunction($collection, array('foo', 'bar'), 5);
    }

    /**
     * @dataProvider assocDeepProvider
     */
    public function testEmptyDepth($collection)
    {
        $this->assertSame(\f::toArray($collection), $this->callFunction($collection, array(), 'foo'));
    }

    public function assocDeepProvider()
    {
        return $this->collectionDataProvider(array(
            'foo' => 3
        ));
    }
}