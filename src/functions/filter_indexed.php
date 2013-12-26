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
 * f\filter_indexed($fn, $coll)
 *
 * Same than filter but keeping the index.
 *
 * f\filter(function ($value) { return $value % 2 == 0; }, range(1, 6));
 * => array(1 => 2, 3 => 4, 5 => 6)
 */
function filter_indexed($fn, $coll) {
    $result = array();
    foreach ($coll as $key => $value) {
        if (call_user_func($fn, $value, $key)) {
            $result[$key] = $value;
        }
    }

    return $result;
}
