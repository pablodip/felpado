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
 * f\validate($value, $validator)
 *
 * Returns whether a value passed through a validator is true or false.
 *
 * f\validate(1, 'is_int')
 * => true
 *
 * f\validate(1.0, 'is_int')
 * => false
 */
function validate($value, $validator) {
    return !!call_user_func($validator, $value);
}
