<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class methodTest extends FunctionTestCase
{
    /**
     * @dataProvider methodNameProvider
     */
    public function testMethod($methodName)
    {
        $dateTime = new \DateTime();
        $method = $this->callFunction($methodName);

        $this->assertSame($dateTime->$methodName(), $method($dateTime));
    }

    public function methodNameProvider()
    {
        return array(
            array('getOffset'),
            array('getTimestamp'),
        );
    }
}