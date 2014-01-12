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
 * f\flatten($coll)
 *
 * Returns a new collection without nesting combinations.
 *
 * f\flatten(array(1, array(2, 3)));
 * => array(1, 2, 3)
 *
 * f\flatten(array(1, 2, 3));
 * => array(1, 2, 3)
 *
 * f\first(array(1, array(2, array(3))));
 * => array(1, 2, 3)
 */
function flatten($coll) {
    $result = array();
    foreach (new \RecursiveIteratorIterator(new \RecursiveArrayIterator(f\to_array($coll))) as $v) {
        $result[] = $v;
    }

    return $result;
}
