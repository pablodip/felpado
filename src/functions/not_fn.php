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
 * f\not_fn($fn)
 *
 * Returns the negated boolean value when executing a function;
 *
 * f\not_fn(function () { return true; });
 * => false
 *
 * f\not_fn(function () { return false; });
 * => true
 */
function not_fn($fn) {
    /*
     * Code from https://github.com/nikic/iter/blob/master/src/iter.fn.php
     */
    return function() use ($fn) {
        return !call_user_func_array($fn, func_get_args());
    };
}
