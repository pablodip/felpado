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
 * f\each($fn, $coll)
 *
 * Iterates over collection calling fn for each value.
 *
 * f\each(function ($value, $key) { do_something($value, $key); }, array(1, 2, 3));
 * => null
 */
function each($fn, $coll) {
    foreach ($coll as $key => $value) {
        call_user_func($fn, $value, $key);
    }
}
