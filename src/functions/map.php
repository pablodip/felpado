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
 * f\map($fn, $coll)
 *
 * Returns an array with fn applied to each value of collection.
 * Map does not keep the index. Only the value is passed to fn, not the key.
 *
 * f\map(function ($element) { return $element * 2; }, array(1, 2, 3));
 * => array(2, 4, 6)
 */
function map($fn, $coll) {
    $result = array();
    foreach ($coll as $key => $value) {
        $result[$key] = call_user_func($fn, $value, $key);
    }

    return $result;
}
