<?php

namespace felpado\tests;

use felpado as f;

class requiredTest extends felpadoTestCase
{
    public function testRequiredReturnsARequiredInstance()
    {
        $paramRule = f\required();
        $this->assertInstanceOf('felpado\required', $paramRule);
    }

    public function testRequiredPassesTheParams()
    {
        $paramRule = f\required(['v' => 'foo', 'n' => 'bar']);

        $this->assertInstanceOf('felpado\required', $paramRule);
        $this->assertSame('foo', $paramRule->getValidator());
        $this->assertSame('bar', $paramRule->getNormalizer());
    }
}
