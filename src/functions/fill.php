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

function fill($coll, $rules) {
    $fill = function ($coll, $rule, $key) {
        if (f\not($rule instanceof value_rule)) {
            throw new \InvalidArgumentException('Fill rules must be created with felpado\required and felpado\optional.');
        }

        if ($rule instanceof required) {
            if (f\not(f\contains($coll, $key))) {
                throw new \Exception(sprintf('"%s" is required.', $key));
            }

            $value = f\get($coll, $key);
        } else {
            $value = f\get($coll, $key, $rule->getDefault());
        }

        return f\assoc($coll, $key, $value);
    };

    return f\reduce($fill, $rules, $coll);
}
