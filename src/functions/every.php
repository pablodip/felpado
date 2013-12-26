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
 * f\every($fn, $coll)
 *
 * Returns true if fn applied to all elements of coll returns logical true, otherwise false.
 *
 * f\every(function ($v) { return $v > 10; }, array(20, 30, 40));
 * => true
 *
 * f\every(function ($) { return $v > 10; }, array(5, 20, 30));
 * => false
 */
function every($fn, $coll) {
    foreach ($coll as $v) {
        if (!call_user_func($fn, $v)) {
            return false;
        }
    }

    return true;
}
