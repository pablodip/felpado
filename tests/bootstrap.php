<?php

namespace Felpado\Tests;

exec(__DIR__.'/../bin/compile');

require_once __DIR__.'/../felpado-compiled.php';
require_once __DIR__.'/TestCase.php';
require_once __DIR__.'/FunctionTestCase.php';


spl_autoload_register('Felpado\Tests\tests_autoload');

function tests_autoload($class) {
    if (is_class_from_tests($class)) {
        require_once file_for_test_class($class);
    }
}

function is_class_from_tests($class) {
    return (strpos($class, 'Felpado\Tests') === 0);
}

function file_for_test_class($class) {
    return sprintf('%s/functions/%sTest.php',
        __DIR__,
        function_from_test_class($class)
    );
}

function function_from_test_class($class) {
    return remove_test_namespace(remove_test_suffix($class));
}

function remove_test_namespace($class) {
    return substr($class, strlen('Felpado\\Tests\\'));
}

function remove_test_suffix($class) {
    return preg_replace('/Test$/', '', $class);
}