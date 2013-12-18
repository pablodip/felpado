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
 * map($callback, $collection)
 *
 * Returns an array with callback applied to each value of collection.
 *
 * map(function ($element) { return $element * 2; }, array(1, 2, 3));
 * => array(2, 4, 6)
 */
function map($callback, $collection) {
    $result = array();
    foreach ($collection as $key => $value) {
        $result[$key] = call_user_func($callback, $value, $key);
    }

    return $result;
}
