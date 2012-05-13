<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
function assoc($collection, $key, $value) {
    $result = to_array($collection);
    $result[$key] = $value;

    return $result;
}
function conjoin($collection, $value) {
    $result = to_array($collection);
    $result[] = $value;

    return $result;
}
function construct($first, $rest) {
    $array = to_array($rest);
    array_unshift($array, $first);

    return $array;
}
function contains($collection, $searched) {
    foreach ($collection as $value) {
        if ($value == $searched) {
            return true;
        }
    }

    return false;
}
function contains_strict($collection, $searched) {
    foreach ($collection as $value) {
        if ($value === $searched) {
            return true;
        }
    }

    return false;
}
function every($callback, $collection) {
    foreach ($collection as $value) {
        if (!call_user_func($callback, $value)) {
            return false;
        }
    }

    return true;
}
function feach($callback, $collection) {
    foreach ($collection as $key => $value) {
        call_user_func($callback, $value, $key);
    }
}
function filter($callback, $collection) {
    $result = array();
    foreach ($collection as $key => $value) {
        if (call_user_func($callback, $value, $key)) {
            $result[$key] = $value;
        }
    }

    return $result;
}
function find($callback, $collection) {
    foreach ($collection as $value) {
        if ($callback($value)) {
            return $value;
        }
    }
}
function first($collection) {
    foreach ($collection as $value) {
        return $value;
    }
}
function fkey($key) {
    return function (array $array) use ($key) {
        return $array[$key];
    };
}
function fmax($collection, $callback = null) {
    if ($callback === null) {
        $callback = function ($value) { return $value; };
    }

    $maxValue = first($collection);
    $maxCompare = call_user_func($callback, $maxValue);

    foreach (rest($collection) as $value) {
        $compare = call_user_func($callback, $value);

        if ($compare > $maxCompare) {
            $maxValue = $value;
            $maxCompare = $compare;
        }
    }

    return $maxValue;
}
function fmin($collection, $callback = null) {
    if ($callback === null) {
        $callback = function ($value) { return $value; };
    }

    $maxValue = first($collection);
    $maxCompare = call_user_func($callback, $maxValue);

    foreach (rest($collection) as $value) {
        $compare = call_user_func($callback, $value);

        if ($compare < $maxCompare) {
            $maxValue = $value;
            $maxCompare = $compare;
        }
    }

    return $maxValue;
}
function foldl() {
    return call_user_func_array('reduce', func_get_args());
}
function group_by($callback, $collection) {
    $result = array();
    foreach ($collection as $value) {
        $result[call_user_func($callback, $value)][] = $value;
    }

    return $result;
}
function keys($collection) {
    $result = array();
    foreach ($collection as $key => $value) {
        $result[] = $key;
    }

    return $result;
}
function last($collection) {
    $array = to_array($collection);
    $last = end($array);

    return $last !== false ? $last : (count($array) ? false : null);
}
function map($callback, $collection) {
    $result = array();
    foreach ($collection as $key => $value) {
        $result[$key] = call_user_func($callback, $value, $key);
    }

    return $result;
}
function method($method) {
    return function ($object) use ($method) {
        return $object->$method();
    };
}
function property($property) {
    return function ($object) use ($property) {
        return $object->$property;
    };
}
function reduce($callback, $collection, $initialValue = null) {
    $result = null;
    foreach ($collection as $key => $value) {
        if ($result === null) {
            if ($initialValue === null) {
                $result = $value;
                continue;
            } else {
                $result = $initialValue;
            }
        }

        $result = call_user_func($callback, $result, $value);
    }

    return $result;
}
function rest($collection) {
    foreach ($collection as $key => $value) {
        if (!isset($result)) {
            $result = array();
        } else {
            $result[$key] = $value;
        }
    }

    return isset($result) ? $result : array();
}
function reverse($collection) {
    return array_reverse(to_array($collection), true);
}
function select() {
    return call_user_func_array('filter', func_get_args());
}
function some($callback, $collection) {
    foreach ($collection as $value) {
        if (call_user_func($callback, $value)) {
            return true;
        }
    }

    return false;
}
function to_array($collection) {
    if (is_array($collection)) {
        return $collection;
    }

    if ($collection instanceof \Traversable) {
        return iterator_to_array($collection);
    }

    throw new \InvalidArgumentException('The value can not be converted to an array.');
}
function values($collection) {
    $result = array();
    foreach ($collection as $value) {
        $result[] = $value;
    }

    return $result;
}