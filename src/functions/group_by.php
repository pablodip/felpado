<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

function group_by($callback, $collection) {
    $result = array();
    foreach ($collection as $value) {
        $result[call_user_func($callback, $value)][] = $value;
    }

    return $result;
}