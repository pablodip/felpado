<?php

namespace felpado\tests;

use felpado as f;

/*
 * Code from https://github.com/nikic/iter/blob/master/test/IterFnTest.php
 */
class complementTest extends felpadoTestCase
{
    public function testIt() {
        $constFalse = f\complement(function() { return true; });
        $constTrue = f\complement(function() { return false; });
        $invert = f\complement(function($bool) { return $bool; });
        $nand = f\complement(f\operator('&&'));

        $this->assertEquals(false, $constFalse());
        $this->assertEquals(true, $constTrue());
        $this->assertEquals(false, $invert(true));
        $this->assertEquals(true, $invert(false));
        $this->assertEquals(false, $nand(true, true));
        $this->assertEquals(true, $nand(true, false));
    }
}
