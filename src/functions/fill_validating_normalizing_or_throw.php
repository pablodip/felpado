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
 * f\fill_validating_normalizing_or_throw($coll, $paramRules)
 *
 * Combines filling, validating and normalization, throwing if validation fails.
 */
function fill_validating_normalizing_or_throw($coll, $paramRules) {
    f\validate_collection_or_throw($coll, $paramRules);

    $filled = f\fill($coll, $paramRules);

    return f\normalize_coll($filled, $paramRules);
}
