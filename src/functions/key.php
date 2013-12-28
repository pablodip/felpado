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
 * f\key($key)
 *
 * Returns a closure that returns the value of a coll with the given key.
 *
 * $key = f\key('foo');
 * $key(array('foo' => 2, 'bar' => 4));
 * => 2
 *
 * map(f\key('foo'), array(
 *     array('foo' => 2, 'bar' => 4),
 *     array('foo' => 6, 'bar' => 8),
 * ))
 * => array(2, 6)
 */
function key($key) {
    return function ($coll) use ($key) {
        return $coll[$key];
    };
}
