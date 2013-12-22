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
 * f\_()
 *
 * Returns a placeholder to use with partial (see partial).
 *
 * f\_();
 * => felpado\placeholder()
 *
 * $firstCharacter = f\partial('substr', f\_(), 0, 1);
 * => clojure to return the first character of a string
 */
function _() {
    return f\placeholder::getInstance();
}
