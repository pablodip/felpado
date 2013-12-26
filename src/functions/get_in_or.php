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
 * f\get_in_or($coll, $in, $default)
 *
 * Returns a element of a collection in a nested structure in.
 * The default is returned if the in does not exist.
 *
 * f\get_in_or(array('a' => array('a1' => 'foo'), array('a', 'a1'));
 * => 'foo'
 *
 * f\get_in_or(array('a' => array('a1' => 'foo'), array('a', 'a2'), 'bar');
 * => 'bar'
 */
function get_in_or($coll, $in, $default) {
    $arrayIn = f\collection_in($coll, $in);

    if ($arrayIn === false) {
        return $default;
    }

    return f\get_or($arrayIn, f\last($in), $default);
}
