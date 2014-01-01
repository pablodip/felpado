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
 * f\max($coll, $fn = null)
 *
 * Returns the maximum value of coll when applying fn.
 * If fn is not set, no function is applied.
 *
 * // without fn
 * f\max(array(1, 2, 3))
 * => 3
 *
 * //with fn
 * $users = array(array('name' => 'foo', 'age' => 10), array('name' => 'bar', 'age' => 20))
 * $fn = function ($v) { return $v['age']; }
 * f\max($users, $fn)
 * => array('name' => 'bar', 'age' => 20)
 *
 * //with f\key
 * f\max($users, f\key('age'))
 * => array('name' => 'bar', 'age' => 20)
 */
function max($coll, $fn = null) {
    if ($fn === null) {
        $fn = function ($v) { return $v; };
    }

    $maxValue = f\first($coll);
    $maxCompare = call_user_func($fn, $maxValue);

    foreach (f\rest($coll) as $value) {
        $compare = call_user_func($fn, $value);

        if ($compare > $maxCompare) {
            $maxValue = $value;
            $maxCompare = $compare;
        }
    }

    return $maxValue;
}
