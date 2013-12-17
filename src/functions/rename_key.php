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

function rename_key($collection, $from, $to) {
    return f\assoc(f\dissoc($collection, $from), $to, f\get($collection, $from));
}