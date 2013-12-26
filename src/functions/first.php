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
 * f\first($coll)
 *
 * Returns the first value of a collection, or null if the collection is empty.
 *
 * f\first(array(1, 2, 3));
 * => 1
 *
 * f\first(array());
 * => null
 */
function first($coll) {
    foreach ($coll as $v) {
        return $v;
    }
}
