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

function partial_merge_args($left, $right) {
    foreach ($left as &$v) {
        if ($v instanceof placeholder) {
            if (empty($right)) {
                throw new \InvalidArgumentException('The placeholder cannot be resolved.');
            }

            $v = f\first($right);
            $right = f\rest($right);
        }
    }

    return array_merge($left, $right);
}
