<?php

namespace felpado\tests;

use felpado as f;

class rename_keysTest extends felpadoTestCase
{
    /**
     * @dataProvider renameKeysProvider
     */
    public function testRenameKeys($coll)
    {
        $this->assertSame(array(
            'one' => 3,
            'two' => 9,
        ), f\rename_keys($coll, array('foo' => 'one', 'bar' => 'two')));

        $this->assertSame(array(
            'one' => 3,
            'bar' => 9,
        ), f\rename_keys(f\to_array($coll), array('foo' => 'one', 'bar' => 'bar')));
    }

    public function renameKeysProvider()
    {
        return $this->provideColl(array(
            'foo' => 3,
            'bar' => 9,
        ));
    }
}
