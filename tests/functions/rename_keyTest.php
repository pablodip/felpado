<?php

namespace felpado\tests;

use felpado as f;

class rename_keyTest extends felpadoTestCase
{
    /**
     * @dataProvider renameKeyProvider
     */
    public function testRenameKey($coll)
    {
        $this->assertSame(array(
            'foo' => 3,
            'ups' => 9,
        ), f\rename_key($coll, 'bar', 'ups'));

        $this->assertSame(f\to_array($coll), f\rename_key($coll, 'bar', 'bar'));
    }

    public function renameKeyProvider()
    {
        return $this->provideColl(array(
            'foo' => 3,
            'bar' => 9,
        ));
    }
}
