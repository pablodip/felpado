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

function dissoc($collection, $key) {
    $result = f\to_array($collection);
    unset($result[$key]);

    return $result;
}
