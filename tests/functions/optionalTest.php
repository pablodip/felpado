<?php

namespace felpado\tests;

use felpado as f;

class optionalTest extends felpadoTestCase
{
    public function testOptionalReturnsAnOptionalInstance()
    {
        $paramRule = f\optional();
        $this->assertInstanceOf('felpado\optional', $paramRule);
    }

    public function testRequiredPassesTheParams()
    {
        $paramRule = f\optional(['d' => 'ups', 'v' => 'foo', 'n' => 'bar']);

        $this->assertInstanceOf('felpado\optional', $paramRule);
        $this->assertSame('ups', $paramRule->getDefaultValue());
        $this->assertSame('foo', $paramRule->getValidator());
        $this->assertSame('bar', $paramRule->getNormalizer());
    }
}
