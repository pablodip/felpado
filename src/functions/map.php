<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace f;

function map($callback, $collection) {
    $result = array();
    foreach ($collection as $key => $value) {
        $result[$key] = call_user_func($callback, $value, $key);
    }

    return $result;
}