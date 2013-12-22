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

function normalize_collection($collection, $normalizers) {
    $result = f\to_array($collection);

    foreach ($normalizers as $name => $normalizer) {
        if ($normalizer instanceof param_rule) {
            $normalizer = $normalizer->getNormalizer();
            if (f\not($normalizer)) {
                continue;
            }
        }

        $result[$name] = call_user_func($normalizer, f\get($collection, $name));
    }

    return $result;
}
