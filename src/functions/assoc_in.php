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
 * f\assoc_in($coll, $in, $value)
 *
 * Returns an array based on coll with value associated in the nested structure of in.
 *
 * f\assoc_in(array('a' => 1), array('b', 'b1'), 2);
 * => array('a' => 1, 'b' => array('b1' => 2))
 *
 * // does nothing without in
 * f\assoc_in(array('a' => 1), array(), 2);
 * => array('a' => 1)
 *
 * // supports infinite nesting
 * f\assoc_in(array(), array('a', 'a1', 'a1I', 'a1IA'), 1);
 * => array('a' => array('a1' => array('a1I' => array('a1IA' => 1))))
 */
function assoc_in($coll, $in, $value) {
    if (empty($in)) {
        return $coll;
    }

    $array = f\to_array($coll);

    $current =& $array;
    foreach ($in as $k) {
        if (array_key_exists($k, $current)) {
            if (!is_array($current[$k])) {
                throw new \LogicException();
            }
        } else {
            $current[$k] = array();
        }

        $current =& $current[$k];
    }

    $current = $value;

    return $array;
}
