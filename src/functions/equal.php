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
 * f\equal($value1, $value2 & more)
 *
 * Returns whether two or more values are equal.
 *
 * f\equal(1, 1)
 * => true
 *
 * f\equal(1, 1, 1)
 * => true
 *
 * f\equal(1, 2)
 * => false
 *
 * f\equal(1, 1, 2)
 * => false
 */
function equal($v1, $v2) {
    foreach (f\rest(func_get_args()) as $v) {
        if ($v1 != $v) {
            return false;
        }
    }

    return true;
}
