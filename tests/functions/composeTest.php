<?php

namespace felpado\tests;

class composeTest extends felpadoTestCase
{
    public function testCompose()
    {
        $c1 = $this->callFunction('md5', 'strtoupper', 'trim', 'strrev');
        $c2 = $this->callFunction('count', 'array_filter');

        $this->assertSame(md5('OLLEH'), $c1(' hello '));
        $this->assertSame(2, $c2(array('1', 2, '3', 4, '5'), 'is_int'));
    }
}
