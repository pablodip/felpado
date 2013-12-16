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

function assoc_in($coll, $in, $value)
{
    $array = f\to_array($coll);

    if (empty($in)) {
        return $array;
    }

    $current =& $array;
    foreach ($in as $k) {
        if (array_key_exists($k, $current)) {
            if (!is_array($current[$k])) {
                throw new \LogicException();
            }
        } else {
            $current[$k] = array();
        }

        $current =& $current[$k];
    }

    $current = $value;

    return $array;
}
