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
 * every($callback, $collection)
 *
 * Returns true if callback applied to all values of collection returns logical true, otherwise false.
 *
 * every(function ($value) { return $value > 10; }, array(20, 30, 40));
 * => true
 *
 * every(function ($value) { return $value > 10; }, array(5, 20, 30));
 * => false
 */
function every($callback, $collection) {
    foreach ($collection as $value) {
        if (!call_user_func($callback, $value)) {
            return false;
        }
    }

    return true;
}