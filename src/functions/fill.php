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
 * f\fill($coll, $paramRules)
 *
 * Returns a new collection filled with param rules.
 * If a param is optional and it does not exist and there is a default value, it's filled.
 * If a param exists and there is no param rule for that param, it's not filled.
 *
 * // filling with empty coll
 * f\fill(array(), array('a' => f\optional(array('d' => 1)));
 * => array('a' => 1)
 *
 * // filling with existing coll
 * f\fill(array('a' => 1), array('a' => f\required(), 'b' => f\optional(array('d' => 2)));
 * => array('a' => 1, 'b' => 2)
 *
 * // without param rule
 * f\fill(array('a' => 1, 'b' => 2), array('a' => f\required()));
 * => array()
 */
function fill($coll, $paramRules) {
    $fill = function ($result, $rule, $key) use ($coll) {
        if (f\not($rule instanceof param_rule)) {
            throw new \InvalidArgumentException('Fill rules must be created with felpado\required and felpado\optional.');
        }

        if ($rule instanceof optional) {
            $value = f\get_or($coll, $key, $rule->getDefaultValue());
        } else {
            $value = f\get($coll, $key);
        }

        return f\assoc($result, $key, $value);
    };

    return f\reduce($fill, $paramRules, array());
}
