<?php

$felpado = __DIR__ . '/../src/felpado.php';
require $felpado;

use felpado as f;

$code = file_get_contents($felpado);
$classCode = felpado_class_code($code);
$functions = felpado_functions_from_class_code($classCode);
$newFunctions = felpado_underscorize_functions($functions);

felpado_save_functions($newFunctions, __DIR__ . '/../src/functions');

function felpado_class_code($code) {
    return preg_replace("@\A.*\n(class Felpado\n.*\n\}).*\Z@ms", '$1', $code);
    //return substr($code, strpos($code, 'class Felpado'));
}

function felpado_functions_from_class_code($code) {
    $regex = "@(?<=\n    )(?:/\*\*|(?:public|private)).*\n    \}@msU";
    preg_match_all($regex, $code, $matches);

    $functionsCode = f::map('felpado_clean_function_code', $matches[0]);

    $names = f::map(function ($code) {
        return preg_replace("@\A.*function (\w+).*\Z@ms", '$1', $code);
    }, $functionsCode);

    return f::renameKeys($functionsCode, $names);
}

function felpado_clean_function_code($code) {
    $removeVisibilityAndStatic = function ($code) { return preg_replace('/^\w+ static /m', '', $code); };
    $removeIndentation = f::partial('remove_indentation', f::_(), 4);
    $replaceClassByNamespace = function ($code) { return str_replace('f::', 'f\\', $code); };

    $cleaner = f::compose($removeVisibilityAndStatic, $removeIndentation, $replaceClassByNamespace);

    return $cleaner($code);
}

function remove_indentation($string, $length) {
    return str_replace("\n".str_repeat(' ', $length), "\n", $string);
}

function felpado_underscorize_functions($functions) {
    $names = f::keys($functions);
    $newNames = f::map('underscore', $names);

    $replaceNames = function ($code) use ($names, $newNames) { return str_replace($names, $newNames, $code); };
    $newFunctions = f::map($replaceNames, $functions);

    return f::renameKeys($newFunctions, array_combine($names, $newNames));
}

function underscore($string) {
    if ($string === '_') {
        return $string;
    }

    return strtolower(preg_replace(array('/([A-Z]+)([A-Z][a-z])/', '/([a-z\d])([A-Z])/'), array('\\1_\\2', '\\1_\\2'), strtr($string, '_', '.')));
}

function felpado_save_functions($functions, $dir) {
    $saveFunction = function ($code, $name) use ($dir) {
        $file = sprintf('%s/%s.php', $dir, $name);
        $contents = felpado_function_template($code);

        file_put_contents($file, $contents);
    };
    f::map($saveFunction, $functions);
}

function felpado_function_template($code) {
    return sprintf(<<<EOF
<?php

/*
 * This file is part of felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace felpado;

use felpado as f;

%s
EOF
    , $code);
}
