<?php

namespace Felpado\Tests;

class conjoin_assocTest extends FunctionTestCase
{
    public function testConjoinAssoc()
    {
        $array = $expected = array('foo' => 3, 'bar' => 9);
        $expected['ups'] = 5;

        $this->assertSame($expected, $this->callFunction($array, 'ups', 5));
    }
}