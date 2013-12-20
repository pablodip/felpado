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

    $validate = function ($value, $key) use ($coll) {
        if ($value instanceof required) {
            if (f\not(f\contains($coll, $key))) {
                return 'required';
            }

            $callback = $value->getCallback();
        } else {
            $callback = $value;
        }

        if (f\not(call_user_func($callback, f\get($coll, $key)))) {
            return 'invalid';
        }
    };

    return f\filter('felpado\identity', f\map($validate, $rules));
}
