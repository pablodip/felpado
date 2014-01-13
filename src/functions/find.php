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
 * f\find($fn, $coll)
 *
 * Returns the first value that returns logical true applied to fn. Otherwise null.
 *
 * f\find(function ($value) { return $value % 2 == 0; }, range(1, 6));
 * => 2
 *
 * f\find(function ($value) { return $value % 2 == 0; }, array(1, 3, 5);
 * => null
 */
function find($fn, $coll) {
    foreach ($coll as $v) {
        if (call_user_func($fn, $v)) {
            return $v;
        }
    }
}
