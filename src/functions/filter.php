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
 * filter($callback, $collection)
 *
 * Returns an array with the values of collection that appled to callback return logical true.
 *
 * filter(function ($value) { return $value % 2 == 0; }, range(1, 6));
 * => array(2, 4, 6)
 */
function filter($callback, $collection) {
    $result = array();
    foreach ($collection as $key => $value) {
        if (call_user_func($callback, $value, $key)) {
            $result[$key] = $value;
        }
    }

    return $result;
}