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
 * fkey($key)
 *
 * Returns a closure that returns the value of an array with the given key.
 *
 * $key = fkey('foo');
 * $key(array('foo' => 2, 'bar' => 4));
 * => 2
 *
 * map(fkey('foo'), array(
 *     array('foo' => 2, 'bar' => 4),
 *     array('foo' => 6, 'bar' => 8),
 * ))
 * => array(2, 6)
 */
function fkey($key) {
    return function (array $array) use ($key) {
        return $array[$key];
    };
}