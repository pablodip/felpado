<?php

namespace felpado;

use felpado as f;

function generate_functions_doc() {
    $functions = functions_info();

    $docHeader = sprintf("# Functions (%d)", count($functions));
    $docSeparator = "\n\n";

    $docFunctionList = function ($functions) {
        $functionLink = function ($function) {
            return sprintf('[%s](#%s)', $function['name'], $function['name']);
        };

        return implode(", ", f\map($functionLink, $functions));
    };

    $docFunctionsDoc = function ($functions) {
        $search = array('%name%', '%usage%', '%desc%', '%example%');
        $template = f\partial('str_replace', $search, f\_(), function_doc_template());

        $replace = function ($function) {
            return array(
                $function['name'],
                $function['doc']['usage'],
                $function['doc']['desc'],
                $function['doc']['example']
            );
        };

        $process = f\compose($template, $replace);

        return implode("\n\n", f\map($process, $functions));
    };

    return $docHeader.
           $docSeparator.
           $docFunctionList($functions).
           $docSeparator.
           $docFunctionsDoc($functions).
           "\n";
}

function function_doc_template() {
    return <<<EOF
<a name="%name%"></a>
### f\%name%

%usage%

%desc%

```
%example%
```
EOF
    ;
}

function functions_info() {
    $functionFromFile = f\compose(f\partial('substr', f\_(), 0, -4), 'basename');

    $getFunctions = function () use ($functionFromFile) {
        $files = glob(__DIR__ . '/functions/*.php');
        $keysMap = f\map($functionFromFile, $files);

        return f\rename_keys($files, $keysMap);
    };
    $functions = $getFunctions();

    $buildInfo = function($file) use ($functionFromFile) {
        $function = $functionFromFile($file);
        $code = file_get_contents($file);

        return array(
            'name' => $function,
            'file' => $file,
            'code' => $code,
            'doc' => function_doc_info_from_code($code)
        );
    };

    return f\map($buildInfo, $functions);
}

function function_doc_info_from_code($code) {
    $buildDoc = function ($raw, $doc) {
        return array('raw' => $raw, 'usage' => $doc[0], 'desc' => $doc[1], 'example' => $doc[2]);
    };

    $docTemplate = array('', '', '');

    $getRawDoc = function ($contents) {
        if (preg_match('@^/\*\*\n(.*)\n \*/\nfunction.@ms', $contents, $matches)) {
            return preg_replace('/^ \* ?/m', '', $matches[1]);
        }

        return false;
    };
    $rawDoc = $getRawDoc($code);

    if ($rawDoc === false) {
        return $buildDoc('', $docTemplate);
    }

    $processDoc = f\compose(f\partial('array_replace', $docTemplate), f\partial('explode', "\n\n", f\_(), 3));
    $doc = $processDoc($rawDoc);

    return $buildDoc($rawDoc, $doc);
}
