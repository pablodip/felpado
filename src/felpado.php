<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

class f extends Felpado
{
}

class Felpado
{
    /**
     * assoc($collection, $key, $value)
     *
     * Returns an array based on collection with value added and keyed.
     *
     * conjoin(array('a' => 1, 'b' => 2), 'c', 3);
     * => array(array('a' => 1, 'b' => 2, 'c' => 3))
     */
    public static function assoc($collection, $key, $value)
    {
        $result = f::toArray($collection);
        $result[$key] = $value;

        return $result;
    }

    public static function assocIn($collection, $in, $value)
    {
        $array = f::toArray($collection);

        if ($in) {
            $deepArray =& $array;
            foreach (f::dropLast($in) as $k) {
                if (array_key_exists($k, $deepArray)) {
                    if (!is_array($deepArray[$k])) {
                        throw new \LogicException();
                    }
                } else {
                    $deepArray[$k] = array();
                }

                $deepArray =& $deepArray[$k];
            }

            $deepArray[f::last($in)] = $value;
        }

        return $array;
    }

    /**
     * conjoin($collection, $value)
     *
     * Returns an array based on collection with value added.
     *G
     * conjoin(array(1, 2, 3), 4);
     * => array(1, 2, 3, 4)
     */
    public static function conjoin($collection, $value) {
        $result = f::toArray($collection);
        $result[] = $value;

        return $result;
    }

    /**
     * construct($first, $rest)
     *
     * Returns an array with first and rest.
     *
     * construct(1, array(2, 3, 4));
     * => array(1, 2, 3, 4)
     */
    public static function construct($first, $rest) {
        $array = f::toArray($rest);
        array_unshift($array, $first);

        return $array;
    }

    /**
     * contains($collection, $key)
     *
     * Returns true if the key is present in the collection, otherwise false.
     * The comparison is done with the normal comparison operator `==`.
     *
     * contains(array('a' => 1, 'b' => 2), 'a');
     * => true
     *
     * contains(array('a' => 1, 'b' => 2), 'c');
     * => false
     *
     * // normal comparison operator ==, not strict
     * contains(array(1 => 'a', 2 => 'b'), '1');
     * => true
     */
    public static function contains($collection, $key) {
        foreach ($collection as $k => $value) {
            if ($k == $key) {
                return true;
            }
        }

        return false;
    }

    public static function containsIn($collection, $in)
    {
        $arrayIn = f::collectionIn($collection, $in);

        if ($arrayIn === false) {
            return false;
        }

        return f::contains($arrayIn, f::last($in));
    }

    /**
     * contains_strict($collection, $key)
     *
     * Same than `containts` but uses the strict comparison operator `===`.
     *
     * // strict comparison operator ===
     * contains(array(1 => 'a', 2 => 'b'), '1');
     * => false
     */
    public static function containsStrict($collection, $key) {
        foreach ($collection as $k => $value) {
            if ($k === $key) {
                return true;
            }
        }

        return false;
    }

    public static function dissoc($collection, $key)
    {
        $result = f::toArray($collection);
        unset($result[$key]);

        return $result;
    }

    public static function dropLast($collection)
    {
        $result = f::toArray($collection);
        unset($result[f::last(f::keys($result))]);

        return $result;
    }

    /**
     * every($callback, $collection)
     *
     * Returns true if callback applied to all values of collection returns logical true, otherwise false.
     *
     * every(function ($value) { return $value > 10; }, array(20, 30, 40));
     * => true
     *
     * every(function ($value) { return $value > 10; }, array(5, 20, 30));
     * => false
     */
    public static function every($callback, $collection) {
        foreach ($collection as $value) {
            if (!call_user_func($callback, $value)) {
                return false;
            }
        }

        return true;
    }

    /**
     * feach($callback, $collection)
     *
     * Iterates over collection calling callback for each value.
     *
     * feach(function ($value, $key) { do_something($value, $key) }, array(1, 2, 3));
     * => null
     */
    public static function each($callback, $collection) {
        foreach ($collection as $key => $value) {
            call_user_func($callback, $value, $key);
        }
    }

    /**
     * filter($callback, $collection)
     *
     * Returns an array with the values of collection that appled to callback return logical true.
     *
     * filter(function ($value) { return $value % 2 == 0; }, range(1, 6));
     * => array(2, 4, 6)
     */
    public static function filter($callback, $collection) {
        $result = array();
        foreach ($collection as $key => $value) {
            if (call_user_func($callback, $value, $key)) {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    /**
     * find($callback, $collection)
     *
     * Returns the first value that returns logical true applied to callback. otherwise null.
     *
     * find(function ($value) { return $value % 2 == 0; }, range(1, 6));
     * => 2
     *
     * find(function ($value) { return $value % 2 == 0; }, array(1, 3, 5);
     * => null
     */
    public static function find($callback, $collection) {
        foreach ($collection as $value) {
            if ($callback($value)) {
                return $value;
            }
        }
    }

    /**
     * first($collection)
     *
     * Returns the first value of collection, or null if collection is empty.
     *
     * first(array(1, 2, 3));
     * => 1
     *
     * first(array());
     * => null
     */
    public static function first($collection) {
        foreach ($collection as $value) {
            return $value;
        }
    }

    public static function get($collection, $key, $default = null)
    {
        $array = f::toArray($collection);

        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        return $default;
    }

    public static function getIn($collection, $in, $default = null)
    {
        $arrayIn = f::collectionIn($collection, $in);

        if ($arrayIn === false) {
            return $default;
        }

        return f::get($arrayIn, f::last($in), $default);
    }

    /**
     * fkey($key)
     *
     * Returns a closure that returns the value of an array with the given key.
     *
     * $key = fkey('foo');
     * $key(array('foo' => 2, 'bar' => 4));
     * => 2
     *
     * map(fkey('foo'), array(
     *     array('foo' => 2, 'bar' => 4),
     *     array('foo' => 6, 'bar' => 8),
     * ))
     * => array(2, 6)
     */
    public static function key($key) {
        return function (array $array) use ($key) {
            return $array[$key];
        };
    }

    public static function max($collection, $callback = null) {
        if ($callback === null) {
            $callback = function ($value) { return $value; };
        }

        $maxValue = f::first($collection);
        $maxCompare = call_user_func($callback, $maxValue);

        foreach (f::rest($collection) as $value) {
            $compare = call_user_func($callback, $value);

            if ($compare > $maxCompare) {
                $maxValue = $value;
                $maxCompare = $compare;
            }
        }

        return $maxValue;
    }

    public static function min($collection, $callback = null) {
        if ($callback === null) {
            $callback = function ($value) { return $value; };
        }

        $maxValue = f::first($collection);
        $maxCompare = call_user_func($callback, $maxValue);

        foreach (f::rest($collection) as $value) {
            $compare = call_user_func($callback, $value);

            if ($compare < $maxCompare) {
                $maxValue = $value;
                $maxCompare = $compare;
            }
        }

        return $maxValue;
    }

    public static function foldl() {
        return call_user_func_array(array('Felpado', 'reduce'), func_get_args());
    }

    /**
     * group_by($callback, $collection)
     *
     * Returns an array with the values of collection keyed by the result of callback on each value.
     *
     * group_by('strlen', array('one', 'two', 'three'));
     * => array(3 => array('one', 'two'), 5 => array('three'))
     */
    public static function groupBy($callback, $collection) {
        $result = array();
        foreach ($collection as $value) {
            $result[call_user_func($callback, $value)][] = $value;
        }

        return $result;
    }

    /**
     * keys($collection)
     *
     * Returns an array with the keys of collection.
     *
     * keys(array('one' => 1, 'two' => 2, 'three' => 3));
     * => array('one', 'two', 'three')
     */
    public static function keys($collection) {
        $result = array();
        foreach ($collection as $key => $value) {
            $result[] = $key;
        }

        return $result;
    }

    /**
     * last($collection)
     *
     * Returns the last value of collection, or null if collection is empty.
     *
     * last(array(1, 2, 3));
     * => 3
     *
     * last(array());
     * => null
     */
    public static function last($collection) {
        $array = f::toArray($collection);
        $last = end($array);

        return $last !== false ? $last : (count($array) ? false : null);
    }

    /**
     * map($callback, $collection)
     *
     * Returns an array with callback applied to each value of collection.
     *
     * map(function ($element) { return $element * 2; }, array(1, 2, 3));
     * => array(2, 4, 6)
     */
    public static function map($callback, $collection) {
        $result = array();
        foreach ($collection as $key => $value) {
            $result[$key] = call_user_func($callback, $value, $key);
        }

        return $result;
    }

    /**
     * method($method)
     *
     * Returns a closure that calls the given method and returns its value in an object.
     *
     * // here Object accept the id in the constructor and returns it through the getId method
     * $getId = method('getId');
     * $getId(new Object(2));
     * => 2
     *
     * // useful with another functions
     * map(method('getId'), array(new Object(2), new Object(6)))
     * => array(2, 6)
     */
    public static function method($method) {
        return function ($object) use ($method) {
            return $object->$method();
        };
    }

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
    public static function property($property) {
        return function ($object) use ($property) {
            return $object->$property;
        };
    }

    public static function reduce($callback, $collection, $initialValue = null) {
        $result = null;
        foreach ($collection as $value) {
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

    public static function renameKey($collection, $from, $to)
    {
        return f::dissoc(f::assoc($collection, $to, f::get($collection, $from)), $from);
    }

    public static function renameKeys($collection, $keysMap)
    {
        if (count($keysMap)) {
            $from = f::first(f::keys($keysMap));
            $to = f::first($keysMap);

            return f::renameKeys(
                f::renameKey($collection, $from, $to),
                f::dissoc($keysMap, $from)
            );
        }

        return $collection;
    }

    /**
     * rest($collection)
     *
     * Returns an array with the values of collection after the first.
     * It returns an empty array if collection is empty or has only one value.
     *
     * rest(array(1, 2, 3, 4, 5));
     * => array(2, 3, 4, 5)
     *
     * rest(array(1));
     * => array()
     *
     * rest(array());
     * => array()
     */
    public static function rest($collection) {
        foreach ($collection as $key => $value) {
            if (!isset($result)) {
                $result = array();
            } else {
                $result[$key] = $value;
            }
        }

        return isset($result) ? $result : array();
    }

    /**
     * reverse($collection)
     *
     * Returns an array with collection in the reverse order.
     *
     * rest(array(1, 2, 3));
     * => array(3, 2, 1)
     */
    public static function reverse($collection) {
        return array_reverse(f::toArray($collection), true);
    }

    public static function select() {
        return call_user_func_array(array('Felpado', 'filter'), func_get_args());
    }

    /**
     * some($callback, $collection)
     *
     * Returns true if callback applied to any value of collection returns logical true, otherwise false.
     *
     * some(function ($value) { return $value > 10; }, array(5, 20, 30));
     * => true
     *
     * some(function ($value) { return $value > 10; }, array(5, 8, 9));
     * => false
     */
    public static function some($callback, $collection) {
        foreach ($collection as $value) {
            if (call_user_func($callback, $value)) {
                return true;
            }
        }

        return false;
    }

    public static function toArray($collection) {
        if (is_array($collection)) {
            return $collection;
        }

        if ($collection instanceof \Traversable) {
            return iterator_to_array($collection);
        }

        throw new \InvalidArgumentException('The value can not be converted to an array.');
    }

    /**
     * values($collection)
     *
     * Returns an array with the values of collection.
     *
     * values(array('one' => 1, 'two' => 2, 'three' => 3));
     * => array(1, 2, 3)
     */
    public static function values($collection) {
        $result = array();
        foreach ($collection as $value) {
            $result[] = $value;
        }

        return $result;
    }

    private static function collectionIn($collection, $in)
    {
        $depth = f::dropLast($in);

        if (count($depth)) {
            return f::collectionDepth($collection, $depth);
        }

        return f::toArray($collection);
    }

    private static function collectionDepth($array, $depth)
    {
        $first = f::first($depth);

        if (f::contains($array, $first)) {
            $arrayIn = f::toArray(f::get($array, $first));

            $inRest = f::rest($depth);
            if (count($inRest)) {
                return f::collectionDepth($arrayIn, $inRest);
            }

            return $arrayIn;
        }

        return false;
    }
}
