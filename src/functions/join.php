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
 * f\join($coll)
 * f\join($separator, $coll)
 *
 * Returns a string joining all the elements in coll, with an optional separator.
 *
 * f\join(array(1, 2, 3));
 * => "123"
 *
 * f\join(', ', array(1, 2, 3));
 * => "1, 2, 3"
 */
function join() {
    $args = func_get_args();

    if (count($args) == 1) {
        $separator = '';
        $coll = $args[0];
    } else {
        $separator = $args[0];
        $coll = $args[1];
    }

    return implode($separator, f\to_array($coll));
}
