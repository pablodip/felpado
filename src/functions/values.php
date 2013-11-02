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
 * values($collection)
 *
 * Returns an array with the values of collection.
 *
 * values(array('one' => 1, 'two' => 2, 'three' => 3));
 * => array(1, 2, 3)
 */
function values($collection) {
    $result = array();
    foreach ($collection as $value) {
        $result[] = $value;
    }

    return $result;
}