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
 * reverse($collection)
 *
 * Returns an array with collection in the reverse order.
 *
 * rest(array(1, 2, 3));
 * => array(3, 2, 1)
 */
function reverse($collection) {
    return array_reverse(to_array($collection), true);
}