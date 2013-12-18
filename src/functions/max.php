<?php

/*
 * This file is part of felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace felpado;

use felpado as f;

function max($collection, $callback = null) {
    if ($callback === null) {
        $callback = function ($value) { return $value; };
    }

    $maxValue = f\first($collection);
    $maxCompare = call_user_func($callback, $maxValue);

    foreach (f\rest($collection) as $value) {
        $compare = call_user_func($callback, $value);

        if ($compare > $maxCompare) {
            $maxValue = $value;
            $maxCompare = $compare;
        }
    }

    return $maxValue;
}
