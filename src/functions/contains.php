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
 * contains($collection, $key)
 *
 * Returns true if the key is present in the collection, otherwise false.
 * The comparison is done with the normal comparison operator `==`.
 *
 * contains(array('a' => 1, 'b' => 2), 'a');
 * => true
 *
 * contains(array('a' => 1, 'b' => 2), 'c');
 * => false
 *
 * // normal comparison operator ==, not strict
 * contains(array(1 => 'a', 2 => 'b'), '1');
 * => true
 */
function contains($collection, $key) {
    foreach ($collection as $k => $value) {
        if ($k == $key) {
            return true;
        }
    }

    return false;
}
