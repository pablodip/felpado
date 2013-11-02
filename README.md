# Felpado

[![Build Status](https://secure.travis-ci.org/pablodip/felpado.png)](http://travis-ci.org/pablodip/felpado)

Felpado provides functions to process data easier.

Most of these functions are common in functional programming, but in PHP they either not exist or are bad implemented.

Felpado's functions have the following principles:

  * Arguments are never modified by reference (which PHP does a lot).
  * A callable can be any PHP callable.
  * When accepting a collection, it can be either an array or a traversable object.
  * When returning a collection, it will always be an array.

## Functions

## Author

Pablo Díez - <pablodip@gmail.com>

## License

Felpado is licensed under the MIT License. See the LICENSE file for full details.