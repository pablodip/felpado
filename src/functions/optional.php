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
 * f\optional($config)
 *
 * Returns an optional param rule.
 *
 * Config (all optional):
 *   * `defaultValue` or `d`
 *   * `validator` or `v`
 *   * `normalizer` or `n`
 *
 * $paramRule = f\optional();
 * => felpado\optional
 *
 * $paramRule = f\optional(array('defaultValue' => '1', 'validator' => 'is_numeric', 'normalizer' => 'intval'));
 * => felpado\optional
 */
function optional($config = array()) {
    return new optional($config);
}
