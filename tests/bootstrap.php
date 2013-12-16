<?php

$loader = require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/felpadoTestCase.php';

$felpadoFunctionTestAutoloader = function ($class) {
    var_dump($class);
    if (preg_match('/^felpado\\\tests\\\(?P<filename>\w+Test)$/', $class, $matches)) {
        require sprintf('%s/functions/%s.php', __DIR__, $matches['filename']);
    }
};
spl_autoload_register($felpadoFunctionTestAutoloader);

return;


require __DIR__.'/doc_file.php';

$sourceFile = __DIR__.'/../src/felpado.php';
$docFile = __DIR__.'/../FUNCTIONS.md';

felpado\doc\generate_doc_file($docFile, $sourceFile);
