<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class renameKeyTest extends FunctionTestCase
{
    /**
     * @dataProvider renameKeyProvider
     */
    public function testRenameKey($collection)
    {
        $this->assertSame(array(
            'foo' => 3,
            'ups' => 9,
        ), $this->callFunction($collection, 'bar', 'ups'));
    }

    public function renameKeyProvider()
    {
        return $this->collectionDataProvider(array(
            'foo' => 3,
            'bar' => 9,
        ));
    }
}