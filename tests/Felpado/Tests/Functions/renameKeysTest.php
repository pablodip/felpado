<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;
use Felpado as f;

class renameKeysTest extends FunctionTestCase
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
        ), $this->callFunction(f::toArray($collection), array('foo' => 'one', 'bar' => 'bar')));
    }

    public function renameKeysProvider()
    {
        return $this->collectionDataProvider(array(
            'foo' => 3,
            'bar' => 9,
        ));
    }
}
