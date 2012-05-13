<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

function some($callback, $collection) {
    foreach ($collection as $value) {
        if (call_user_func($callback, $value)) {
            return true;
        }
    }

    return false;
}