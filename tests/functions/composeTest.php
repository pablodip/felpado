<?php

namespace felpado\tests;

use felpado as f;

class composeTest extends felpadoTestCase
{
    public function testCompose()
    {
        $c1 = f\compose('md5', 'strtoupper', 'trim', 'strrev');
        $c2 = f\compose('count', 'array_filter');

        $this->assertSame(md5('OLLEH'), $c1(' hello '));
        $this->assertSame(2, $c2(array('1', 2, '3', 4, '5'), 'is_int'));
    }
}
