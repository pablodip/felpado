<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

function fmin($collection, $callback = null) {
    if ($callback === null) {
        $callback = function ($value) { return $value; };
    }

    $maxValue = first($collection);
    $maxCompare = call_user_func($callback, $maxValue);

    foreach (rest($collection) as $value) {
        $compare = call_user_func($callback, $value);

        if ($compare < $maxCompare) {
            $maxValue = $value;
            $maxCompare = $compare;
        }
    }

    return $maxValue;
}