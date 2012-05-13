<?php

namespace Felpado\Tests;

class FunctionTestCase extends TestCase
{
    protected function callFunction()
    {
        return call_user_func_array($this->functionName(), func_get_args());
    }

    protected function functionName()
    {
        return function_from_test_class(get_class($this));
    }
}