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
 * first($collection)
 *
 * Returns the first value of collection, or null if collection is empty.
 *
 * first(array(1, 2, 3));
 * => 1
 *
 * first(array());
 * => null
 */
function first($collection) {
    foreach ($collection as $value) {
        return $value;
    }
}