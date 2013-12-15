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
 * property($property)
 *
 * Returns a closure that returns the given property of an object.
 *
 * // here Object accept the id in the constructor and returns it through the id property
 * $id = property('id');
 * $id(new Object(2));
 * => 2
 *
 * // useful with another functions
 * map(property('id'), array(new Object(2), new Object(6)))
 * => array(2, 6)
 */
function property($property) {
    return function ($object) use ($property) {
        return $object->$property;
    };
}