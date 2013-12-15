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
        $function = $this->functionFromTestClass(get_class($this));

        return '\\felpado\\'.$function;
    }

    private function functionFromTestClass($class) {
        return $this->underscorize($this->removeTestNamespace($this->removeTestSuffix($class)));
    }

    private function removeTestNamespace($class) {
        return substr($class, strlen('Felpado\\Tests\\Functions\\'));
    }

    private function removeTestSuffix($class) {
        return preg_replace('/Test$/', '', $class);
    }

    private function underscorize($string)
    {
        return strtolower(preg_replace(array('/([A-Z]+)([A-Z][a-z])/', '/([a-z\d])([A-Z])/'), array('\\1_\\2', '\\1_\\2'), strtr($string, '_', '.')));
    }
}
