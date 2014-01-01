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

/**
 * f\validate_coll_or_throw($coll, $paramRules, $exceptionClass = 'Exception')
 *
 * Same than f\validate_coll but throws an exception if there is any error.
 */
function validate_coll_or_throw($coll, $paramRules, $exceptionClass = 'Exception') {
    $errors = f\validate_coll($coll, $paramRules);

    if ($errors) {
        throw new $exceptionClass(json_encode($errors, true));
    }
}
