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
 * some($callback, $collection)
 *
 * Returns true if callback applied to any value of collection returns logical true, otherwise false.
 *
 * some(function ($value) { return $value > 10; }, array(5, 20, 30));
 * => true
 *
 * some(function ($value) { return $value > 10; }, array(5, 8, 9));
 * => false
 */
function some($callback, $collection) {
    foreach ($collection as $value) {
        if (call_user_func($callback, $value)) {
            return true;
        }
    }

    return false;
}