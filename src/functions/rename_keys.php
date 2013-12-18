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

function rename_keys($collection, $keysMap) {
    if (count($keysMap)) {
        $from = f\first(f\keys($keysMap));
        $to = f\first($keysMap);

        return f\rename_keys(
            f\rename_key($collection, $from, $to),
            f\dissoc($keysMap, $from)
        );
    }

    return $collection;
}
