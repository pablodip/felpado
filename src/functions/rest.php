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