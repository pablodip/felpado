<?php

$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('Felpado\Tests', __DIR__);

return;


require __DIR__.'/doc_file.php';

$sourceFile = __DIR__.'/../src/felpado.php';
$docFile = __DIR__.'/../FUNCTIONS.md';

felpado\doc\generate_doc_file($docFile, $sourceFile);
