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
 * f\get_or($coll, $key, $default)
 *
 * Returns a element of a collection by key.
 * The default is returned if the key does not exist.
 *
 * f\get(array('a' => 1, 'b' => 2), 'a');
 * => 1
 *
 * f\get(array('a' => 1, 'b' => 2), 'c', 3);
 * => 3
 */
function get_or($coll, $key, $default) {
    foreach ($coll as $k => $v) {
        if ($key == $k) {
            return $v;
        }
    }

    return $default;
}
