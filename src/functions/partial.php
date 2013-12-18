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

function partial() {
    $fa = func_get_args();

    $callback = f\first($fa);
    $args = f\rest($fa);

    return function () use ($callback, $args) {
        return call_user_func_array($callback, f\partial_merge_args($args, func_get_args()));
    };
}
