<?php

namespace felpado\tests;

class felpadoTestCase extends \PHPUnit_Framework_TestCase
{
    protected function callFunction()
    {
        $callable = $this->callableFromTestClass();

        return call_user_func_array($callable, func_get_args());
    }

    private function callableFromTestClass()
    {
        $function = $this->functionFromTestClass(get_class($this));

        return '\\felpado\\'.$function;
    }

    private function functionFromTestClass($class) {
        return $this->removeTestNamespace($this->removeTestSuffix($class));
    }

    private function removeTestNamespace($class) {
        return substr($class, strlen('felpado\\tests\\'));
    }

    private function removeTestSuffix($class) {
        return preg_replace('/Test$/', '', $class);
    }

    public function indexedCollectionProvider()
    {
        return $this->collProvider(array(
            4,
            5,
            'foo',
            'bar',
        ));
    }

    public function associativeCollectionProvider()
    {
        return $this->collProvider(array(
            'one' => 1,
            'two' => 2,
            4     => 'four',
            5     => 'five',
        ));
    }

    public function oneItemCollectionProvider()
    {
        return $this->collProvider(array(2));
    }

    public function emptyCollectionProvider()
    {
        return $this->collProvider(array());
    }

    protected function collProvider(array $array)
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
