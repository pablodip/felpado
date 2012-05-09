<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace f;

function construct($first, $rest) {
    $array = to_array($rest);
    array_unshift($array, $first);

    return $array;
}