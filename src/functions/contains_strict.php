<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * contains_strict($collection, $searched)
 *
 * Same than `containts` but uses the strict comparison operator `===`.
 *
 * // strict comparison operator ===
 * contains_strict(array(1, 2, 3), '1');
 * => false
 */
function contains_strict($collection, $searched) {
    foreach ($collection as $value) {
        if ($value === $searched) {
            return true;
        }
    }

    return false;
}