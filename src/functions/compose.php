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
 * f\compose(callable $fn1 [, $fn...])
 *
 * Returns a function that is the composition of the passed functions.
 * The first function (right to left) receives the passed args, and the rest the result.
 *
 * $revUp = f\compose('strtoupper', 'strrev');
 * $revUp('hello');
 * => OLLEH
 */
function compose() {
    $fns = func_get_args();

    return f\reduce(function ($composition, $fn) {
        return function() use ($composition, $fn) {
            return call_user_func($fn, call_user_func_array($composition, func_get_args()));
        };
    }, f\reverse($fns));
}
