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
 * construct($first, $rest)
 *
 * Returns an array with first and rest.
 *
 * construct(1, array(2, 3, 4));
 * => array(1, 2, 3, 4)
 */
function construct($first, $rest) {
    $array = f\to_array($rest);
    array_unshift($array, $first);

    return $array;
}
