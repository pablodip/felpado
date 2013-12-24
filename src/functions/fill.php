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

function fill($collection, $paramRules) {
    $fill = function ($result, $paramRule, $key) use ($collection) {
        if (f\not($paramRule instanceof param_rule)) {
            throw new \InvalidArgumentException('Fill rules must be created with felpado\required and felpado\optional.');
        }

        if ($paramRule instanceof required) {
            if (f\not(f\contains($collection, $key))) {
                throw new \Exception(sprintf('"%s" is required.', $key));
            }

            $value = f\get($collection, $key);
        } else {
            $value = f\get($collection, $key, $paramRule->getDefaultValue());
        }

        return f\assoc($result, $key, $value);
    };

    return f\reduce($fill, $paramRules, array());
}
