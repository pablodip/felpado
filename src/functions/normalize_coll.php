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
 * f\normalize_coll($coll, $normalizers)
 *
 * Returns a new collection normalizing the elements indicating in normalizers.
 * It accepts param rules as normalizers.
 * It's similar to map_indexed.
 *
 * f\normalize_coll(array('a' => 1.0), array('a' => 'intval'));
 * => array('a' => 1)
 *
 * // elements without normalizers are returned without modification
 * f\normalize_coll(array('a' => 1.0, 'b' => 2.0), array('a' => 'intval'));
 * => array('a' => 1, 'b' => 2.0)
 *
 * // with param rules
 * f\normalize_coll(array('a' => 1.0), array('a' => f\required('normalizer' => 'intval')));
 * => array('a' => 1)
 */
function normalize_coll($collection, $normalizers) {
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
