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
 * f\group_by($fn, $coll)
 *
 * Returns a new collection with the elements grouped by the return of applying fn to each value.
 *
 * f\group_by('strlen', array('one', 'two', 'three'));
 * => array(3 => array('one', 'two'), 5 => array('three'))
 */
function group_by($fn, $coll) {
    $result = array();
    foreach ($coll as $v) {
        $result[call_user_func($fn, $v)][] = $v;
    }

    return $result;
}
