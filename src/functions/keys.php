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
 * keys($collection)
 *
 * Returns an array with the keys of collection.
 *
 * keys(array('one' => 1, 'two' => 2, 'three' => 3));
 * => array('one', 'two', 'three')
 */
function keys($collection) {
    $result = array();
    foreach ($collection as $key => $value) {
        $result[] = $key;
    }

    return $result;
}
