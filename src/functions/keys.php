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

function keys($collection) {
    $result = array();
    foreach ($collection as $key => $value) {
        $result[] = $key;
    }

    return $result;
}