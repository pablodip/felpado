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
 * f\dissoc($coll, $key)
 *
 * Returns an array based on coll with value associated with key removed.
 *
 * f\dissoc(array('a' => 1, 'b' => 2), 'b');
 * => array('a' => 1)
 *
 * f\dissoc(array('a' => 1, 'b' => 2, 'c' => 3), 'b');
 * => array('a' => 1, 'c' => 3)
 */
function dissoc($collection, $key) {
    $result = f\to_array($collection);
    unset($result[$key]);

    return $result;
}
