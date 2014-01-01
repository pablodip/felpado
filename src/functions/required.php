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
 * f\required($config)
 *
 * Returns a required param rule.
 *
 * Config (all required):
 *   * `defaultValue` or `d`
 *   * `validator` or `v`
 *   * `normalizer` or `n`
 *
 * $paramRule = f\required();
 * => felpado\required
 *
 * $paramRule = f\required(array('defaultValue' => '1', 'validator' => 'is_numeric', 'normalizer' => 'intval'));
 * => felpado\required
 */
function required($config = array()) {
    return new required($config);
}
