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

/*
 * Code from https://github.com/nikic/iter/blob/master/src/iter.fn.php
 */
function not_callback($function) {
    return function() use ($function) {
        return !call_user_func_array($function, func_get_args());
    };
}
