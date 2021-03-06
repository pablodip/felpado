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
 * f\filter($fn, $coll)
 *
 * Returns a new collection passing the current collection through the fn.
 *
 * f\filter(function ($value) { return $value % 2 == 0; }, range(1, 6));
 * => array(2, 4, 6)
 */
function filter($fn, $coll) {
    $result = array();
    foreach ($coll as $value) {
        if (call_user_func($fn, $value)) {
            $result[] = $value;
        }
    }

    return $result;
}
