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
 * group_by($callback, $collection)
 *
 * Returns an array with the values of collection keyed by the result of callback on each value.
 *
 * group_by('strlen', array('one', 'two', 'three'));
 * => array(3 => array('one', 'two'), 5 => array('three'))
 */
function group_by($callback, $collection) {
    $result = array();
    foreach ($collection as $value) {
        $result[call_user_func($callback, $value)][] = $value;
    }

    return $result;
}
