<?php

namespace felpado\tests;

class methodTest extends felpadoTestCase
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
