<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

function find($callback, $collection) {
    foreach ($collection as $value) {
        if ($callback($value)) {
            return $value;
        }
    }
}