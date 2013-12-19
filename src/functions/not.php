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
 * f\not($value)
 *
 * Returns the negated boolean value;
 *
 * not(true);
 * => false
 *
 * not(false);
 * => true
 *
 * not('a');
 * => false
 *
 * not('');
 * => true
 */
function not($value) {
    return !$value;
}
