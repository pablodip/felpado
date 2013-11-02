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
 * rest($collection)
 *
 * Returns an array with the values of collection after the first.
 * It returns an empty array if collection is empty or has only one value.
 *
 * rest(array(1, 2, 3, 4, 5));
 * => array(2, 3, 4, 5)
 *
 * rest(array(1));
 * => array()
 *
 * rest(array());
 * => array()
 */
function rest($collection) {
    foreach ($collection as $key => $value) {
        if (!isset($result)) {
            $result = array();
        } else {
            $result[$key] = $value;
        }
    }

    return isset($result) ? $result : array();
}