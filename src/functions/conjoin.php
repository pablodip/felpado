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
 * f\conjoin($coll, $value)
 *
 * Returns an array based on collection with value added.
 *
 * f\conjoin(array(1, 2, 3), 4);
 * => array(1, 2, 3, 4)
 */
function conjoin($coll, $value) {
    $result = f\to_array($coll);
    $result[] = $value;

    return $result;
}
