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

function get_or_throw($collection, $key, $exceptionClass = 'Exception') {
    if (f\not(f\contains($collection, $key))) {
        throw new $exceptionClass(sprintf('The key "%s" does not exist.', $key));
    }

    return f\get($collection, $key);
}
