<?php

namespace Felpado\Tests;

class FunctionTestCase extends TestCase
{
    protected function callFunction()
    {
        $function = $this->functionFromTestClass();

        return call_user_func_array($function, func_get_args());
    }

    private function functionFromTestClass()
    {
        return sprintf('f\\%s', function_from_test_class(get_class($this)));
    }
}