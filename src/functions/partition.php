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
use Traversable;

/**
 * f\partition($n, $coll)
 *
 * Returns a new collection from coll parted in chunks of n length.
 *
 * f\partition(2, range(1, 6));
 * => array(array(1, 2), array(3, 4), array(5, 6)
 *
 * f\partition(3, range(1, 6));
 * => array(array(1, 2, 3), array(4, 5, 6))
 */
function partition($n, $coll) {
    return array_chunk(f\to_array($coll), $n);
}
