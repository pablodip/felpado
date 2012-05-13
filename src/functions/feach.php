<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * f\each($callback, $collection)
 *
 * Iterates over collection calling callback for each element.
 *
 * f\each(function ($value, $key) {
 *    // do something
 * }, array(1, 2, 3));
 * => null
 */
function feach($callback, $collection) {
    foreach ($collection as $key => $value) {
        call_user_func($callback, $value, $key);
    }
}