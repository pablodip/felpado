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

function to_array($collection) {
    if (is_array($collection)) {
        return $collection;
    }

    if ($collection instanceof \Traversable) {
        return iterator_to_array($collection);
    }

    throw new \InvalidArgumentException('The value can not be converted to an array.');
}
