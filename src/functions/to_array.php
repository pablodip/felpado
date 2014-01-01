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
 * f\to_array($coll)
 *
 * Converts to array a coll.
 * If it's already an array, just returns it.
 * If it's a traversable object, converts it.
 * If it's neither an array nor a traversable object, throws an exception.
 *
 * f\to_array(array(1, 2, 3));
 * => array(1, 2, 3)
 *
 * f\to_array(new \ArrayObject(array(1, 2, 3)));
 * => array(1, 2, 3)
 *
 * f\to_array(true);
 * => InvalidArgumentException
 */
function to_array($coll) {
    if (is_array($coll)) {
        return $coll;
    }

    if ($coll instanceof \Traversable) {
        return iterator_to_array($coll);
    }

    throw new \InvalidArgumentException('The value can not be converted to an array.');
}
