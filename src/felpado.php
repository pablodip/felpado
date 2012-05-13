<?php

namespace felpado;

function functions() {
    static $functions;

    if ($functions === null) {
        $functions = build_functions();
    }

    return $functions;
}

function build_functions() {
    $functions = array();
    foreach (find_functions_names() as $name) {
        $functions[] = build_function($name);
    }

    return $functions;
}

function find_functions_names() {
    $names = array();
    foreach (new \DirectoryIterator(__DIR__.'/functions') as $fileInfo) {
        if ($fileInfo->isFile()) {
            $names[] = remove_file_extension($fileInfo->getFilename(), 'php');
        }
    }

    return $names;
}

function remove_file_extension($filename, $extension) {
    return preg_replace(sprintf('/\.%s$/', $extension), '', $filename);
}

function build_function($name) {
    $contents = file_get_contents(function_file($name));

    return array(
        'name' => $name,
        'code' => function_contents_code($contents),
        'doc'  => function_build_doc(function_contents_doc($contents)),
    );
}

function function_file($name) {
    return __DIR__.'/functions/'.$name.'.php';
}

function function_contents_code($contents) {
    return preg_replace('#\A.*?(?=^function)#ms', '', $contents);
}

function function_contents_doc($contents) {
    if (preg_match('#^\/\*\*.*?\*/#ms', $contents, $matches)) {
        return trim(preg_replace('/^.*?\*+[ \/]?/m', '', $matches[0]));
    }
}

function function_build_doc($doc) {
    $parts = array_replace(array('', '', ''), explode("\n\n", $doc));

    return array(
        'raw'     => $doc,
        'usage'   => $parts[0],
        'desc'    => $parts[1],
        'example' => $parts[2],
    );
}

function function_parse_doc($doc)
{
    return array(
    );
}

function require_functions() {
    foreach (functions() as $function) {
        require_once function_file($function['name']);
    }
}