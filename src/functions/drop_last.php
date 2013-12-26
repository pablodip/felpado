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
 * f\drop_last($coll)
 *
 * Returns an array based on coll with the last element removed.
 *
 * f\drop_last(array('a' => 1, 'b' => 2));
 * => array('a' => 1)
 */
function drop_last($collection) {
    $result = f\to_array($collection);
    unset($result[f\last(f\keys($result))]);

    return $result;
}
