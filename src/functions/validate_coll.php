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

function validate_coll($coll, $rules) {
    $validate = function ($rule, $key) use ($coll) {
        if (f\not($rule instanceof value_rule)) {
            throw new \InvalidArgumentException('Validation rules must be created with felpado\required and felpado\optional.');
        }

        if (f\contains($coll, $key)) {
            $value = f\get($coll, $key);
            if (f\not(is_null($value) && $rule instanceof optional)) {
                $isValid = f\validate($value, $rule->getCallback());
                if (f\not($isValid)) {
                    return 'invalid';
                }
            }
        } elseif ($rule instanceof required) {
            return 'required';
        }

        return null;
    };

    return f\filter('felpado\identity', f\map($validate, $rules));
}
