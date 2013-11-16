<?php

namespace felpado\tests;

compile();
require_files();
register_autoload();

function compile() {
    exec(__DIR__.'/../bin/compile');
}

function require_files() {
    foreach (array(
        __DIR__.'/../src/felpado-compiled.php',
        __DIR__.'/TestCase.php',
        __DIR__.'/FunctionTestCase.php'
    ) as $file) {
        require $file;
    }
}

function register_autoload() {
    spl_autoload_register('felpado\\tests\\tests_autoload');
}

function tests_autoload($class) {
    if (is_class_from_tests($class)) {
        require file_for_test_class($class);
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