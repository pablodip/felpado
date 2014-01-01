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
 * f/reverse_indexed($coll)
 *
 * Same than reverse but keeping the index.
 *
 * f\reverse_indexed(array('a' => 1, 'b' => 2, 'c' => 3));
 * => array('c' => 3, 'b' => 2, 'a' => 1)
 */
function reverse_indexed($coll) {
    return array_reverse(f\to_array($coll), true);
}
