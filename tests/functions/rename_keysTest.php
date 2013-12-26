<?php

namespace felpado\tests;

use Felpado\Tests\FunctionTestCase;
use felpado as f;

class rename_keysTest extends felpadoTestCase
{
    /**
     * @dataProvider renameKeysProvider
     */
    public function testRenameKeys($collection)
    {
        $this->assertSame(array(
            'one' => 3,
            'two' => 9,
        ), $this->callFunction($collection, array('foo' => 'one', 'bar' => 'two')));

        $this->assertSame(array(
            'one' => 3,
            'bar' => 9,
        ), $this->callFunction(f\to_array($collection), array('foo' => 'one', 'bar' => 'bar')));
    }

    public function renameKeysProvider()
    {
        return $this->provideColl(array(
            'foo' => 3,
            'bar' => 9,
        ));
    }
}
