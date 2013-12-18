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

function collection_in($collection, $in) {
    $depth = f\drop_last($in);

    if (count($depth)) {
        return f\collection_depth($collection, $depth);
    }

    return f\to_array($collection);
}
