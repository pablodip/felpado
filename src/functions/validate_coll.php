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
 * f\validate_coll($coll, $paramRules)
 *
 * Returns the validation errors when validating coll with param rules.
 *
 * // validating existence
 * f\validate_coll(array(), array('a' => f\required(), 'b' => f\optional()));
 * => array('a' => 'required')
 *
 * // multiple errors
 * f\validate_coll(array(), array('a' => f\required(), 'b' => f\required()));
 * => array('a' => 'required', 'b' => 'required')
 *
 * // validator fn
 * f\validate_coll(array('a' => 1.0), array('a' => f\required('v' => 'is_int')));
 * => array('a' => 'invalid')
 *
 * // without errors
 * f\validate_coll(array('a' => 1), array('a' => f\required('v' => 'is_int')));
 * => array()
 */
function validate_coll($coll, $paramRules) {
    $validate = function ($paramRule, $key) use ($coll) {
        if (f\not($paramRule instanceof param_rule)) {
            throw new \InvalidArgumentException('Param rules must be created with felpado\required and felpado\optional.');
        }

        if (f\contains($coll, $key)) {
            if ($paramRule->getValidator()) {
                $value = f\get($coll, $key);
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

    return f\filter_indexed('felpado\identity', f\map($validate, $paramRules));
}
