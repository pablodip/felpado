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
 * contains($collection, $searched)
 *
 * Returns true if searched is present incollection, otherwise false.
 * The comparison is done with the normal comparison operator `==`.
 *
 * contains(array(1, 2, 3), 1);
 * => true
 *
 * contains(array(1, 2, 3), 4);
 * => false
 *
 * // normal comparison operator ==, not strict
 * contains(array(1, 2, 3), '1');
 * => true
 */
function contains($collection, $searched) {
    foreach ($collection as $value) {
        if ($value == $searched) {
            return true;
        }
    }

    return false;
}