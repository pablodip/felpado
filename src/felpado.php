<?php

namespace felpado;

function functions() {
    static $functions;

    if ($functions === null) {
        $functions = find_functions();
    }

    return $functions;
}

function find_functions() {
    $functions = array();
    foreach (new \DirectoryIterator(__DIR__.'/functions') as $fileInfo) {
        if ($fileInfo->isFile()) {
            $functions[] = remove_php_file_extension($fileInfo->getFilename());
        }
    }

    return $functions;
}

function remove_php_file_extension($filename) {
    return str_replace('.php', '', $filename);
}

function require_functions() {
    foreach (functions() as $function) {
        require_once function_file($function);
    }
}

function function_file($function) {
    return __DIR__.'/functions/'.$function.'.php';
}