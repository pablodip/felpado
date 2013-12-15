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

function get($collection, $key, $default = null)
{
    $array = f\to_array($collection);

    if (array_key_exists($key, $array)) {
        return $array[$key];
    }

    return $default;
}