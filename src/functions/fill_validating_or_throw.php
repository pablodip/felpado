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
 * f\fill_validating_or_throw($coll, $paramRules)
 *
 * Combines filling and validation, throwing if validation fails.
 */
function fill_validating_or_throw($coll, $paramRules) {
    f\validate_collection_or_throw($coll, $paramRules);

    return f\fill($coll, $paramRules);
}
