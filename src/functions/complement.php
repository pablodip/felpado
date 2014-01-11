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
 * f\complement($fn)
 *
 * Returns the negated boolean value when executing a function;
 *
 * $fn = f\complement(function () { return true; });
 * $fn();
 * => false
 *
 * $fn = f\complement(function ($bool) { return $bool; });
 * $fn(true);
 * => false
 */
function complement($fn) {
    /*
     * Code from https://github.com/nikic/iter/blob/master/src/iter.fn.php
     */
    return function() use ($fn) {
        return !call_user_func_array($fn, func_get_args());
    };
}
