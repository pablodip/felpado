<?php

namespace felpado\tests;

use felpado as f;

/*
 * Code from https://github.com/nikic/iter/blob/master/test/IterFnTest.php
 */
class operatorTest extends felpadoTestCase
{
    /** @dataProvider provideTestOperator */
    public function testOperator($op, $a, $b, $result) {
        $fn1 = f\operator($op);
        $fn2 = f\operator($op, $b);

        $this->assertEquals($result, $fn1($a, $b));
        $this->assertEquals($result, $fn2($a));
    }

    public function provideTestOperator() {
        return array(
            array('instanceof', new \stdClass, 'stdClass', true),
            array('*', 3, 2, 6),
            array('/', 3, 2, 1.5),
            array('%', 3, 2, 1),
            array('+', 3, 2, 5),
            array('-', 3, 2, 1),
            array('.', 'foo', 'bar', 'foobar'),
            array('<<', 1, 8, 256),
            array('>>', 256, 8, 1),
            array('<', 3, 5, true),
            array('<=', 5, 5, true),
            array('>', 3, 5, false),
            array('>=', 3, 5, false),
            array('==', 0, 'foo', true),
            array('!=', 1, 'foo', true),
            array('===', 0, 'foo', false),
            array('!==', 0, 'foo', true),
            array('&', 3, 1, 1),
            array('|', 3, 1, 3),
            array('^', 3, 1, 2),
            array('&&', true, false, false),
            array('||', true, false, true),
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unknown operator "**"
     */
    public function testInvalidOperator() {
        f\operator('**');
    }
}
