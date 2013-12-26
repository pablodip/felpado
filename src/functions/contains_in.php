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
 * f\contains_in($coll, $in)
 *
 * Returns whether a nested structure exists or not.
 *
 * f\contains_in(array('a' => array('a1' => 1)), array('a'));
 * => true
 *
 * f\contains_in(array('a' => array('a1' => 1)), array('a', 'a1));
 * => true
 *
 * f\contains_in(array('a' => array('a1' => 1)), array('a', 'a2));
 * => false
 *
 * f\contains_in(array('a' => array('a1' => 1)), array('b'));
 * => false
 *
 * f\contains_in(array('a' => array('a1' => 1)), array('b', 'b1'));
 * => false
 *
 * // returns false with an empty in
 * f\contains_in(array('a' => 1), array());
 * => false
 *
 * // supports infinite nesting
 * f\contains_in(array('a', 'a1', 'a1I', 'a1IA'), array('a', 'a1', 'a1I', 'a1IA'));
 * => true
 */
function contains_in($coll, $in) {
    $arrayIn = f\collection_in($coll, $in);

    if ($arrayIn === false) {
        return false;
    }

    return f\contains($arrayIn, f\last($in));
}
