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

function fill_validating_or_throw($collection, $paramRules) {
    f\validate_collection_or_throw($collection, $paramRules);

    return f\fill($collection, $paramRules);
}
