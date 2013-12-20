<?php

$loader = require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/felpadoTestCase.php';
require __DIR__ . '/../src/doc.php';
require __DIR__ . '/../src/benchmark.php';

/* functions doc */
$generateFunctionsDocFile = function() {
    $file = __DIR__ . '/../FUNCTIONS.md';
    $contents = felpado\generate_functions_doc();

    file_put_contents($file, $contents);
};
$generateFunctionsDocFile();

/* function test autoload */
$felpadoLoadFunctionTestClass = function ($class) {
    if (preg_match('/^felpado\\\tests\\\(?P<filename>\w+Test)$/', $class, $matches)) {
        require sprintf('%s/functions/%s.php', __DIR__, $matches['filename']);
    }
};
spl_autoload_register($felpadoLoadFunctionTestClass);

/* benchmark */
felpado\benchmark();
