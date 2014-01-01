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
 * f\get_in($coll, $in)
 *
 * Returns a element of a collection in a nested structure in.
 * An InvalidArgumentException is thrown if the in does not exist.
 *
 * f\get_in(array('a' => array('a1' => 'foo'), array('a', 'a1');
 * => 'foo'
 */
function get_in($coll, $in) {
    $arrayIn = f\_coll_in($coll, $in);

    if ($arrayIn === false) {
        return $default;
    }

    return f\get($arrayIn, f\last($in));
}
