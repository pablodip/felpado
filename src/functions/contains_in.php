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

function contains_in($collection, $in)
{
    $arrayIn = f\collection_in($collection, $in);

    if ($arrayIn === false) {
        return false;
    }

    return f\contains($arrayIn, f\last($in));
}