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
 * method($method)
 *
 * Returns a closure that calls the given method and returns its value in an object.
 *
 * // here Object accept the id in the constructor and returns it through the getId method
 * $getId = method('getId');
 * $getId(new Object(2));
 * => 2
 *
 * // useful with another functions
 * map(method('getId'), array(new Object(2), new Object(6)))
 * => array(2, 6)
 */
function method($method) {
    $args = f\rest(func_get_args());

    return function ($object) use ($method, $args) {
        return call_user_func_array(array($object, $method), $args);
    };
}
