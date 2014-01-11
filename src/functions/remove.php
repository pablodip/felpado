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
 * f\remove($fn, $coll)
 *
 * Returns a new collection with the values that applied to fn are false.
 *
 * f\remove(function ($value) { return $value % 2 == 0; }, range(1, 6));
 * => array(1, 3, 5)
 */
function remove($fn, $coll) {
    return f\filter(f\complement($fn), $coll);
}
