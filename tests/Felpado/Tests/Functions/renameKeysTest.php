<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class renameKeysTest extends FunctionTestCase
{
    /**
     * @dataProvider renameKeysProvider
     */
    public function testRenameKey($collection)
    {
        $this->assertSame(array(
            'one' => 3,
            'two' => 9,
        ), $this->callFunction($collection, array('foo' => 'one', 'bar' => 'two')));
    }

    public function renameKeysProvider()
    {
        return $this->collectionDataProvider(array(
            'foo' => 3,
            'bar' => 9,
        ));
    }
}