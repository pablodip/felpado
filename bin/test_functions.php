<?php

require __DIR__ . '/../src/felpado.php';

use felpado as f;

$files = glob(__DIR__ . '/../tests/functions/*');

$underscorize = function ($string) {
    return strtolower(preg_replace(array('/([A-Z]+)([A-Z][a-z])/', '/([a-z\d])([A-Z])/'), array('\\1_\\2', '\\1_\\2'), strtr($string, '_', '.')));
};

$renameNamespace = function ($code) {
    return str_replace('namespace Felpado\Tests\Functions;', 'namespace felpado\tests;', $code);
};
$underscorizeFunction = function ($code) use ($underscorize) {
    if (preg_match('/^class ((\w+)Test) extends FunctionTestCase$/m', $code, $matches)) {
        return str_replace($matches[1], $underscorize($matches[2]).'Test', $code);
    }

    return $code;
};
$removeUseFunctionalTestCase = function ($code) {
    return str_replace('use Felpado\Tests\FunctionTestCase;'."\n\n", '', $code);
};
$changeExtendsTofelpadoTestCase = function ($code) {
    return str_replace('extends FunctionTestCase', 'extends felpadoTestCase', $code);
};

$changeCode = f\compose($changeExtendsTofelpadoTestCase, $removeUseFunctionalTestCase, $underscorizeFunction, $renameNamespace);

$changeFile = function ($file) use ($changeCode) {
    $newCode = $changeCode(file_get_contents($file));

    file_put_contents($file, $newCode);
};

f\each($changeFile, $files);
