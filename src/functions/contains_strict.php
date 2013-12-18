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
 * contains_strict($collection, $key)
 *
 * Same than `containts` but uses the strict comparison operator `===`.
 *
 * // strict comparison operator ===
 * contains(array(1 => 'a', 2 => 'b'), '1');
 * => false
 */
function contains_strict($collection, $key) {
    foreach ($collection as $k => $value) {
        if ($k === $key) {
            return true;
        }
    }

    return false;
}
