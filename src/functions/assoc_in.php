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

function assoc_in($collection, $in, $value)
{
    $array = f\to_array($collection);

    if ($in) {
        $deepArray =& $array;
        foreach (f\drop_last($in) as $k) {
            if (array_key_exists($k, $deepArray)) {
                if (!is_array($deepArray[$k])) {
                    throw new \LogicException();
                }
            } else {
                $deepArray[$k] = array();
            }

            $deepArray =& $deepArray[$k];
        }

        $deepArray[f\last($in)] = $value;
    }

    return $array;
}