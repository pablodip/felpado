<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;
use felpado as f;

class partialTest extends FunctionTestCase
{
    public function testPartial()
    {
        $o1 = $this->callFunction([$this, 'over'], 10);
        $o2 = $this->callFunction([$this, 'over'], 10, 5);
        $o3 = $this->callFunction([$this, 'over'], 10, 5, 2);

        $this->assertSame(1, $o1(5, 2));
        $this->assertSame(1, $o2(2));
        $this->assertSame(1, $o3());
    }

    public function testPartialWithPlaceholders()
    {
        $o1 = $this->callFunction([$this, 'over'], f\_(), 5, 2);
        $o2 = $this->callFunction([$this, 'over'], f\_(), f\_(), 2);
        $o3 = $this->callFunction([$this, 'over'], f\_(), 5, f\_());

        $this->assertSame(1, $o1(10));
        $this->assertSame(1, $o2(10, 5));
        $this->assertSame(1, $o3(10, 2));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testPartialWithPlaceholdersShouldThrowAnExceptionIfAPlaceholderValueIsMissing()
    {
        $o = $this->callFunction([$this, 'over'], f\_(), f\_(), 2);

        $o(10);
    }

    public function over($a, $b, $c)
    {
        return $a / $b / $c;
    }
}
