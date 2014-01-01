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
 * f\rename_key($coll, $from, $to)
 *
 * Returns a new coll with a key renamed from from to to.
 *
 * f\rename_key(array('a' => 1), 'a', 'b')
 * => array('b' => 1)
 */
function rename_key($coll, $from, $to) {
    return f\assoc(f\dissoc($coll, $from), $to, f\get($coll, $from));
}
