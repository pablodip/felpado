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
 * feach($callback, $collection)
 *
 * Iterates over collection calling callback for each value.
 *
 * feach(function ($value, $key) { do_something($value, $key) }, array(1, 2, 3));
 * => null
 */
function each($callback, $collection) {
    foreach ($collection as $key => $value) {
        call_user_func($callback, $value, $key);
    }
}