<?php

namespace felpado\tests;

use felpado as f;

class normalize_collTest extends felpadoTestCase
{
    public function testEmpty()
    {
        $this->assertSame(array(), f\normalize_coll(array(), array()));
    }

    public function testReturnsWithoutAlteringValuesWithoutNormalizer()
    {
        $this->assertSame(array('a' => 1), f\normalize_coll(array('a' => 1), array()));
    }

    public function testNormalizes()
    {
        $collection = array('a' => 1, 'b' => 2.0);
        $normalizers = array('a' => 'strval', 'b' => 'intval');

        $expected = array('a' => '1', 'b' => 2);

        $this->assertSame($expected, f\normalize_coll($collection, $normalizers));
    }

    public function testNormalizersCanBeParamRules()
    {
        $collection = array('a' => 1, 'b' => 2.0);
        $normalizers = array(
            'a' => f\required(array('n' => 'strval')),
            'b' => f\optional(array('n' => 'intval'))
        );

        $expected = array('a' => '1', 'b' => 2);

        $this->assertSame($expected, f\normalize_coll($collection, $normalizers));
    }

    public function testParamRulesWithoutNormalizerAreIgnored()
    {
        $collection = array('a' => 1, 'b' => 2.0);
        $normalizers = array(
            'a' => f\required(array('n' => 'strval')),
            'b' => f\optional()
        );

        $expected = array('a' => '1', 'b' => 2.0);

        $this->assertSame($expected, f\normalize_coll($collection, $normalizers));
    }
}
