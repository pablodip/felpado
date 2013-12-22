<?php

namespace felpado\tests;

use felpado as f;

class felpadoTest extends \PHPUnit_Framework_TestCase
{
    public function testPlaceholderGetInstanceReturnsAlwaysTheSameInstance()
    {
        $_ = f\placeholder::getInstance();

        $this->assertSame($_, f\placeholder::getInstance());
        $this->assertSame($_, f\placeholder::getInstance());
    }

    public function testParamRuleConstructs()
    {
        $pr = new f\param_rule();
        $this->assertNull($pr->getValidator());
        $this->assertNull($pr->getNormalizer());
    }

    public function testParamRuleConstructsAcceptsValidatorAndNormalizator()
    {
        $pr = new f\param_rule(array('validator' => 'foo', 'normalizer' => 'bar'));
        $this->assertSame('foo', $pr->getValidator());
        $this->assertSame('bar', $pr->getNormalizer());
    }

    public function testParamRuleConstructsAcceptsVAndN()
    {
        $pr = new f\param_rule(array('v' => 'bar', 'n' => 'foo'));
        $this->assertSame('bar', $pr->getValidator());
        $this->assertSame('foo', $pr->getNormalizer());
    }
}
