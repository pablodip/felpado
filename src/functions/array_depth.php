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

function array_depth($array, $depth)
{
    $first = f\first($depth);

    if (f\contains($array, $first)) {
        $arrayIn = f\to_array(f\get($array, $first));

        $inRest = f\rest($depth);
        if ($inRest) {
            return f\collection_depth($arrayIn, $inRest);
        }

        return $arrayIn;
    }

    return false;
}
