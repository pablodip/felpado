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
 * f\rename_keys($coll, $keysMap)
 *
 * Returns a new coll with the keys from keysMap renamed.
 *
 * f\rename_keys(array('a' => 1, 'b' => 2), array('a' => 'c', 'b' => 'd'))
 * => array('c' => 1, 'd' => 2)
 */
function rename_keys($coll, $keysMap) {
    if (f\not($keysMap)) {
        return $coll;
    }

    $from = f\first(f\keys($keysMap));
    $to = f\first($keysMap);

    return f\rename_keys(
        f\rename_key($coll, $from, $to),
        f\dissoc($keysMap, $from)
    );
}
