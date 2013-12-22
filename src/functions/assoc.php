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
 * f\assoc($coll, $key, $value)
 *
 * Returns an array based on coll with value associated with key.
 *
 * f\assoc(array('a' => 1, 'b' => 2), 'c', 3);
 * => array('a' => 1, 'b' => 2, 'c' => 3)
 */
function assoc($collection, $key, $value) {
    $result = f\to_array($collection);
    $result[$key] = $value;

    return $result;
}
