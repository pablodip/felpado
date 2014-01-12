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
 * f\distinct($coll)
 *
 * Returns a new coll without duplicates.
 *
 * f\distinct(array(1, 2, 3, 2, 4, 5, 3, 1));
 * => array(1, 2, 3, 4, 5)
 */
function distinct($coll) {
    return array_values(array_unique(f\to_array($coll)));
}
