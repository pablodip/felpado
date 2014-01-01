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

/**
 * f\reduce($fn, $coll, $initialValue = null)
 *
 * Reduces coll through fn with an optional initial value.
 * If initial value is not set, function is applied to the two initial values.
 * If initial value is not set and there is only one value, that's the result.
 *
 * f\reduce(function ($accumulator, $value) { return $accumulator + $value; }, array(1, 2, 3))
 * => 6
 *
 * // with initial value
 * f\reduce(function ($accumulator, $value) { return $accumulator + $value; }, array(1, 2, 3), 0)
 * => 6
 *
 * // with initial value
 * f\reduce(function ($accumulator, $value) { return $accumulator + $value; }, array(1, 2, 3), 2)
 * => 8
 */
function reduce($fn, $coll, $initialValue = null) {
    $result = null;
    foreach ($coll as $key => $value) {
        if ($result === null) {
            if ($initialValue === null) {
                $result = $value;
                continue;
            } else {
                $result = $initialValue;
            }
        }

        $result = call_user_func($fn, $result, $value, $key);
    }

    return $result;
}
