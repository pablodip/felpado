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
 * f\some($fn, $coll)
 *
 * Returns true if fn applied to any value of collection returns logical true, otherwise false.
 *
 * f\some(function ($value) { return $value > 10; }, array(5, 20, 30));
 * => true
 *
 * f\some(function ($value) { return $value > 10; }, array(5, 8, 9));
 * => false
 */
function some($fn, $coll) {
    foreach ($coll as $v) {
        if (call_user_func($fn, $v)) {
            return true;
        }
    }

    return false;
}
