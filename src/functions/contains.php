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
 * f\contains($collection, $searched)
 *
 * Returns true if searched is present in the given collection, otherwise false.
 * The comparison is done with the normal comparison operator `==`.
 *
 * f\contains(array(1, 2, 3), 1)
 * => true
 *
 * // normal comparison operator ==, not strict
 * f\contains(array(1, 2, 3), '1')
 * => true
 *
 * f\contains(array(1, 2, 3), 4)
 * => false
 */
function contains($collection, $searched) {
    foreach ($collection as $value) {
        if ($value == $searched) {
            return true;
        }
    }

    return false;
}