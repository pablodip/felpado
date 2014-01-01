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
 * f\partial($fn, $arg1 & more)
 *
 * Partial application. Takes a function and some arguments, and returns a function with
 * those arguments already applied.
 *
 * $replace = f\partial('str_replace', 'foo', 'bar');
 * $replace('this is the string with some foo foo to replace')
 * => this is the string with some bar bar to replace
 *
 * // with placeholders to be able to apply non-first arguments
 * $firstChar = f\partial('substr', f\_(), 0, 1)
 * $firstChar('foo')
 * => f
 *
 * $firstChar('bar')
 * => b
 */
function partial() {
    $fa = func_get_args();

    $callback = f\first($fa);
    $args = f\rest($fa);

    return function () use ($callback, $args) {
        return call_user_func_array($callback, f\_partial_merge_args($args, func_get_args()));
    };
}

function _partial_merge_args($left, $right) {
    foreach ($left as &$v) {
        if ($v instanceof placeholder) {
            if (empty($right)) {
                throw new \InvalidArgumentException('The placeholder cannot be resolved.');
            }

            $v = f\first($right);
            $right = f\rest($right);
        }
    }

    return array_merge($left, $right);
}
