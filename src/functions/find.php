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
 * find($callback, $collection)
 *
 * Returns the first value that returns logical true applied to callback. otherwise null.
 *
 * find(function ($value) { return $value % 2 == 0; }, range(1, 6));
 * => 2
 *
 * find(function ($value) { return $value % 2 == 0; }, array(1, 3, 5);
 * => null
 */
function find($callback, $collection) {
    foreach ($collection as $value) {
        if ($callback($value)) {
            return $value;
        }
    }
}