<?php

namespace felpado\tests;

class felpadoTestCase extends \PHPUnit_Framework_TestCase
{
    public function provideEmptyColl()
    {
        return $this->provideColl(array());
    }

    protected function provideColl(array $array)
    {
        return array(
            array($array),
            array(new \ArrayObject($array)),
        );
    }

    protected function buildExpectedCollArgsProvider($data)
    {
        $provide = array();
        foreach ($data as $d) {
            $provide[] = $d;
            $provide[] = array_replace($d, array(1 => new \ArrayObject($d[1])));
        }

        return $provide;
    }
}
