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
 * f\rest_indexed($coll)
 *
 * Same than f\rest but keeping the index.
 *
 * f\rest_indexed(array('a' => 1, 'b' => 2, 'c' => 3));
 * => array('b' => 2, 'c' => 3)
 *
 * f\rest_indexed(array());
 * => array()
 */
function rest_indexed($coll) {
    foreach ($coll as $k => $v) {
        if (!isset($result)) {
            $result = array();
        } else {
            $result[$k] = $v;
        }
    }

    return isset($result) ? $result : array();
}
