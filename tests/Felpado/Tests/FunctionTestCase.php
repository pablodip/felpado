<?php

namespace Felpado\Tests;

class FunctionTestCase extends TestCase
{
    protected function callFunction()
    {
        $callable = $this->callableFromTestClass();

        return call_user_func_array($callable, func_get_args());
    }

    private function callableFromTestClass()
    {
        return array('Felpado', $this->functionFromTestClass(get_class($this)));
    }

    private function functionFromTestClass($class) {
        return $this->removeTestNamespace($this->removeTestSuffix($class));
    }

    private function removeTestNamespace($class) {
        return substr($class, strlen('Felpado\\Tests\\Functions\\'));
    }

    private function removeTestSuffix($class) {
        return preg_replace('/Test$/', '', $class);
    }
}