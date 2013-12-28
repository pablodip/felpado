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
 * f\is_coll($coll)
 *
 * Returns whether or not a variable is a coll. A coll is considered an array or a traversable object.
 *
 * f\is_coll(array());
 * => true
 *
 * f\is_coll(new \ArrayObject());
 * => true
 *
 * f\is_coll(true);
 * => false
 */
function is_coll($coll) {
    return is_array($coll) || $coll instanceof \Traversable;
}
