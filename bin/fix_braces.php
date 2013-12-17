<?php

require __DIR__ . '/../src/felpado.php';

use felpado as f;

$fixBraces = function ($code) {
    return preg_replace('/\n{/m', ' {', $code);
};

$files = glob(__DIR__ . '/../src/functions/*.php');

$fixFileCode = function ($file) use ($fixBraces) {
    $code = file_get_contents($file);
    $newCode = $fixBraces($code);

    file_put_contents($file, $newCode);
};

f\map($fixFileCode, $files);
