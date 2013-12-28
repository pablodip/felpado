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
 * f\method($method)
 *
 * Returns a closure that calls the given method and returns its value in an object.
 * Optionally additional args can be passed and will be sent when called the method.
 *
 * $getTimestamp = f\method('getTimestamp');
 * $getId(new \DateTime();
 * => `the timestamp`
 *
 * // with bound args
 * $format = f\method('format', 'Y-m-d H:i:s')
 * $format(new \DateTime())
 *
 * // useful with another functions
 * f\map(method('getId'), $articles)
 * => array(`ids of articles`)
 */
function method($method) {
    $args = f\rest(func_get_args());

    return function ($object) use ($method, $args) {
        return call_user_func_array(array($object, $method), $args);
    };
}
