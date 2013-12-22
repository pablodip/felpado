<?php

namespace felpado\tests;

use felpado as f;

class _Test extends felpadoTestCase
{
    public function test_()
    {
        $_ = f\_();
        $this->assertInstanceOf('felpado\placeholder', $_);
    }
}
