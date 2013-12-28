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
 * f\last($coll)
 *
 * Returns the last value of collection, or null if collection is empty.
 *
 * f\last(array(1, 2, 3));
 * => 3
 *
 * f\last(array());
 * => null
 */
function last($coll) {
    $array = f\to_array($coll);
    $last = end($array);

    return $last !== false ? $last : (count($array) ? false : null);
}
