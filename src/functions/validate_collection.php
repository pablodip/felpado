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

function validate_collection($collection, $paramRules) {
    $validate = function ($paramRule, $key) use ($collection) {
        if (f\not($paramRule instanceof param_rule)) {
            throw new \InvalidArgumentException('Param rules must be created with felpado\required and felpado\optional.');
        }

        if (f\contains($collection, $key)) {
            if ($paramRule->getValidator()) {
                $value = f\get($collection, $key);
                if (f\not(is_null($value) && $paramRule instanceof optional)) {
                    $isValid = f\validate($value, $paramRule->getValidator());
                    if (f\not($isValid)) {
                        return 'invalid';
                    }
                }
            }
        } elseif ($paramRule instanceof required) {
            return 'required';
        }

        return null;
    };

    return f\filter('felpado\identity', f\map($validate, $paramRules));
}
