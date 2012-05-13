<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

function to_array($collection) {
    if (is_array($collection)) {
        return $collection;
    }

    if ($collection instanceof \Traversable) {
        return iterator_to_array($collection);
    }

    throw new \InvalidArgumentException('The value can not be converted to an array.');
}