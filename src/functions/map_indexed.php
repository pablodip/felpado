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
 * f\map_indexed($fn, $coll)
 *
 * Same than map but keeping the index. Also the index is passed as second argument to fn.
 *
 * f\map_indexed(function ($element) { return $element * 2; }, array(1, 2, 3));
 * => array(2, 4, 6)
 */
function map_indexed($fn, $coll) {
    $result = array();
    foreach ($coll as $k => $v) {
        $result[$k] = call_user_func($fn, $v, $k);
    }

    return $result;
}

