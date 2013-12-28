# Functions

[_](#_), [array_depth](#array_depth), [assoc](#assoc), [assoc_in](#assoc_in), [collection_depth](#collection_depth), [collection_in](#collection_in), [compose](#compose), [conjoin](#conjoin), [construct](#construct), [contains](#contains), [contains_in](#contains_in), [contains_strict](#contains_strict), [dissoc](#dissoc), [drop_last](#drop_last), [each](#each), [every](#every), [fill](#fill), [fill_validating_normalizing_or_throw](#fill_validating_normalizing_or_throw), [fill_validating_or_throw](#fill_validating_or_throw), [filter](#filter), [filter_indexed](#filter_indexed), [find](#find), [first](#first), [get](#get), [get_in](#get_in), [get_in_or](#get_in_or), [get_or](#get_or), [group_by](#group_by), [identity](#identity), [is_coll](#is_coll), [key](#key), [keys](#keys), [last](#last), [map](#map), [map_indexed](#map_indexed), [max](#max), [method](#method), [min](#min), [normalize_collection](#normalize_collection), [not](#not), [not_callback](#not_callback), [operator](#operator), [optional](#optional), [partial](#partial), [partial_merge_args](#partial_merge_args), [property](#property), [reduce](#reduce), [rename_key](#rename_key), [rename_keys](#rename_keys), [required](#required), [rest](#rest), [reverse](#reverse), [select](#select), [some](#some), [to_array](#to_array), [validate](#validate), [validate_collection](#validate_collection), [validate_collection_or_throw](#validate_collection_or_throw), [values](#values)

<a name="_"></a>
### f\_

f\_()

Returns a placeholder to use with partial (see partial).

```
f\_();
=> felpado\placeholder()

$firstCharacter = f\partial('substr', f\_(), 0, 1);
=> clojure to return the first character of a string
```

<a name="array_depth"></a>
### f\array_depth





```

```

<a name="assoc"></a>
### f\assoc

f\assoc($coll, $key, $value)

Returns an array based on coll with value associated with key.

```
f\assoc(array('a' => 1, 'b' => 2), 'c', 3);
=> array('a' => 1, 'b' => 2, 'c' => 3)
```

<a name="assoc_in"></a>
### f\assoc_in

f\assoc_in($coll, $in, $value)

Returns an array based on coll with value associated in the nested structure of in.

```
f\assoc_in(array('a' => 1), array('b', 'b1'), 2);
=> array('a' => 1, 'b' => array('b1' => 2))

// does nothing without in
f\assoc_in(array('a' => 1), array(), 2);
=> array('a' => 1)

// supports infinite nesting
f\assoc_in(array(), array('a', 'a1', 'a1I', 'a1IA'), 1);
=> array('a' => array('a1' => array('a1I' => array('a1IA' => 1))))
```

<a name="collection_depth"></a>
### f\collection_depth





```

```

<a name="collection_in"></a>
### f\collection_in





```

```

<a name="compose"></a>
### f\compose

f\compose(callable $fn1 [, $fn...])

Returns a function that is the composition of the passed functions.
The first function (right to left) receives the passed args, and the rest the result
of the previous function.

```
$revUp = f\compose('strtoupper', 'strrev');
$revUp('hello');
=> OLLEH
```

<a name="conjoin"></a>
### f\conjoin

f\conjoin($coll, $value)

Returns an array based on collection with value added.

```
f\conjoin(array(1, 2, 3), 4);
=> array(1, 2, 3, 4)
```

<a name="construct"></a>
### f\construct

f\construct($first, $rest)

Returns an array with first and rest.

```
f\construct(1, array(2, 3, 4));
=> array(1, 2, 3, 4)
```

<a name="contains"></a>
### f\contains

f\contains($collection, $key)

Returns true if the key is present in the collection, otherwise false.
The comparison is done with the strict comparison operator `==`.

```
contains(array('a' => 1, 'b' => 2), 'a');
=> true

contains(array('a' => 1, 'b' => 2), 'c');
=> false

// normal comparison operator ==, not strict
contains(array(1 => 'a', 2 => 'b'), '1');
=> true
```

<a name="contains_in"></a>
### f\contains_in

f\contains_in($coll, $in)

Returns whether a nested structure exists or not.

```
f\contains_in(array('a' => array('a1' => 1)), array('a'));
=> true

f\contains_in(array('a' => array('a1' => 1)), array('a', 'a1));
=> true

f\contains_in(array('a' => array('a1' => 1)), array('a', 'a2));
=> false

f\contains_in(array('a' => array('a1' => 1)), array('b'));
=> false

f\contains_in(array('a' => array('a1' => 1)), array('b', 'b1'));
=> false

// returns false with an empty in
f\contains_in(array('a' => 1), array());
=> false

// supports infinite nesting
f\contains_in(array('a', 'a1', 'a1I', 'a1IA'), array('a', 'a1', 'a1I', 'a1IA'));
=> true
```

<a name="contains_strict"></a>
### f\contains_strict

f\contains_strict($coll, $key)

Same than `f\containts` but uses the strict comparison operator `===`.

```
// strict comparison operator ===
f\contains(array(1 => 'a', 2 => 'b'), '1');
=> false
```

<a name="dissoc"></a>
### f\dissoc

f\dissoc($coll, $key)

Returns an array based on coll with value associated with key removed.

```
f\dissoc(array('a' => 1, 'b' => 2), 'b');
=> array('a' => 1)

f\dissoc(array('a' => 1, 'b' => 2, 'c' => 3), 'b');
=> array('a' => 1, 'c' => 3)
```

<a name="drop_last"></a>
### f\drop_last

f\drop_last($coll)

Returns an array based on coll with the last element removed.

```
f\drop_last(array('a' => 1, 'b' => 2));
=> array('a' => 1)
```

<a name="each"></a>
### f\each

f\each($fn, $coll)

Iterates over collection calling fn for each value.

```
f\each(function ($value, $key) { do_something($value, $key); }, array(1, 2, 3));
=> null
```

<a name="every"></a>
### f\every

f\every($fn, $coll)

Returns true if fn applied to all elements of coll returns logical true, otherwise false.

```
f\every(function ($v) { return $v > 10; }, array(20, 30, 40));
=> true

f\every(function ($) { return $v > 10; }, array(5, 20, 30));
=> false
```

<a name="fill"></a>
### f\fill

f\fill($coll, $paramRules)

Returns a new collection filled with param rules.
If a param is optional and it does not exist and there is a default value, it's filled.
If a param exists and there is no param rule for that param, it's not filled.

```
// filling with empty coll
f\fill(array(), array('a' => f\optional(array('d' => 1)));
=> array('a' => 1)

// filling with existing coll
f\fill(array('a' => 1), array('a' => f\required(), 'b' => f\optional(array('d' => 2)));
=> array('a' => 1, 'b' => 2)

// without param rule
f\fill(array('a' => 1, 'b' => 2), array('a' => f\required()));
=> array()
```

<a name="fill_validating_normalizing_or_throw"></a>
### f\fill_validating_normalizing_or_throw

f\fill_validating_normalizing_or_throw($coll, $paramRules)

Combines filling, validating and normalization, throwing if validation fails.

```

```

<a name="fill_validating_or_throw"></a>
### f\fill_validating_or_throw

f\fill_validating_or_throw($coll, $paramRules)

Combines filling and validation, throwing if validation fails.

```

```

<a name="filter"></a>
### f\filter

f\filter($fn, $coll)

Returns a new collection passing the current collection through the fn.

```
f\filter(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> array(2, 4, 6)
```

<a name="filter_indexed"></a>
### f\filter_indexed

f\filter_indexed($fn, $coll)

Same than filter but keeping the index.

```
f\filter_indexed(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> array(1 => 2, 3 => 4, 5 => 6)
```

<a name="find"></a>
### f\find

f\find($fn, $coll)

Returns the first value that returns logical true applied to fn. Otherwise null.

```
f\find(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> 2

f\find(function ($value) { return $value % 2 == 0; }, array(1, 3, 5);
=> null
```

<a name="first"></a>
### f\first

f\first($coll)

Returns the first value of a collection, or null if the collection is empty.

```
f\first(array(1, 2, 3));
=> 1

f\first(array());
=> null
```

<a name="get"></a>
### f\get

f\get($coll, $key)

Returns a element of a collection by key.
An InvalidArgumentException is thrown if the key does not exist.

```
f\get(array('a' => 1, 'b' => 2), 'a');
=> 1

f\get(array('a' => 1, 'b' => 2), 'b');
=> 2
```

<a name="get_in"></a>
### f\get_in

f\get_in($coll, $in)

Returns a element of a collection in a nested structure in.
An InvalidArgumentException is thrown if the in does not exist.

```
f\get_in(array('a' => array('a1' => 'foo'), array('a', 'a1');
=> 'foo'
```

<a name="get_in_or"></a>
### f\get_in_or

f\get_in_or($coll, $in, $default)

Returns a element of a collection in a nested structure in.
The default is returned if the in does not exist.

```
f\get_in_or(array('a' => array('a1' => 'foo'), array('a', 'a1'));
=> 'foo'

f\get_in_or(array('a' => array('a1' => 'foo'), array('a', 'a2'), 'bar');
=> 'bar'
```

<a name="get_or"></a>
### f\get_or

f\get_or($coll, $key, $default)

Returns a element of a collection by key.
The default is returned if the key does not exist.

```
f\get(array('a' => 1, 'b' => 2), 'a');
=> 1

f\get(array('a' => 1, 'b' => 2), 'c', 3);
=> 3
```

<a name="group_by"></a>
### f\group_by

f\group_by($fn, $coll)

Returns a new collection with the elements grouped by the return of applying fn to each value.

```
f\group_by('strlen', array('one', 'two', 'three'));
=> array(3 => array('one', 'two'), 5 => array('three'))
```

<a name="identity"></a>
### f\identity

f\identity($v)

Returns the same value.

```
f\identity('foo');
=> 'foo'

f\identity(2);
=> 2
```

<a name="is_coll"></a>
### f\is_coll

f\is_coll($coll)

Returns whether or not a variable is a coll. A coll is considered an array or a traversable object.

```
f\is_coll(array());
=> true

f\is_coll(new \ArrayObject());
=> true

f\is_coll(true);
=> false
```

<a name="key"></a>
### f\key

f\key($key)

Returns a closure that returns the value of a coll with the given key.

```
$key = f\key('foo');
$key(array('foo' => 2, 'bar' => 4));
=> 2

map(f\key('foo'), array(
    array('foo' => 2, 'bar' => 4),
    array('foo' => 6, 'bar' => 8),
))
=> array(2, 6)
```

<a name="keys"></a>
### f\keys

f\keys($coll)

Returns an array with the keys of collection.

```
f\keys(array('one' => 1, 'two' => 2, 'three' => 3));
=> array('one', 'two', 'three')
```

<a name="last"></a>
### f\last

f\last($coll)

Returns the last value of collection, or null if collection is empty.

```
f\last(array(1, 2, 3));
=> 3

f\last(array());
=> null
```

<a name="map"></a>
### f\map

f\map($fn, $coll)

Returns an array with fn applied to each value of collection.
Map does not keep the index. Only the value is passed to fn, not the key.

```
f\map(function ($element) { return $element * 2; }, array(1, 2, 3));
=> array(2, 4, 6)
```

<a name="map_indexed"></a>
### f\map_indexed

f\map_indexed($fn, $coll)

Same than map but keeping the index. Also the index is passed as second argument to fn.

```
f\map_indexed(function ($element) { return $element * 2; }, array(1, 2, 3));
=> array(2, 4, 6)
```

<a name="max"></a>
### f\max





```

```

<a name="method"></a>
### f\method

f\method($method)

Returns a closure that calls the given method and returns its value in an object.
Optionally additional args can be passed and will be sent when called the method.

```
$getTimestamp = f\method('getTimestamp');
$getId(new \DateTime();
=> `the timestamp`

// with bound args
$format = f\method('format', 'Y-m-d H:i:s')
$format(new \DateTime())

// useful with another functions
f\map(method('getId'), $articles)
=> array(`ids of articles`)
```

<a name="min"></a>
### f\min





```

```

<a name="normalize_collection"></a>
### f\normalize_collection





```

```

<a name="not"></a>
### f\not

f\not($value)

Returns the negated boolean value;

```
not(true);
=> false

not(false);
=> true

not('a');
=> false

not('');
=> true
```

<a name="not_callback"></a>
### f\not_callback





```

```

<a name="operator"></a>
### f\operator





```

```

<a name="optional"></a>
### f\optional





```

```

<a name="partial"></a>
### f\partial





```

```

<a name="partial_merge_args"></a>
### f\partial_merge_args





```

```

<a name="property"></a>
### f\property

property($property)

Returns a closure that returns the given property of an object.

```
// here Object accept the id in the constructor and returns it through the id property
$id = property('id');
$id(new Object(2));
=> 2

// useful with another functions
map(property('id'), array(new Object(2), new Object(6)))
=> array(2, 6)
```

<a name="reduce"></a>
### f\reduce





```

```

<a name="rename_key"></a>
### f\rename_key





```

```

<a name="rename_keys"></a>
### f\rename_keys





```

```

<a name="required"></a>
### f\required





```

```

<a name="rest"></a>
### f\rest

rest($collection)

Returns an array with the values of collection after the first.
It returns an empty array if collection is empty or has only one value.

```
rest(array(1, 2, 3, 4, 5));
=> array(2, 3, 4, 5)

rest(array(1));
=> array()

rest(array());
=> array()
```

<a name="reverse"></a>
### f\reverse

reverse($collection)

Returns an array with collection in the reverse order.

```
rest(array(1, 2, 3));
=> array(3, 2, 1)
```

<a name="select"></a>
### f\select





```

```

<a name="some"></a>
### f\some

some($callback, $collection)

Returns true if callback applied to any value of collection returns logical true, otherwise false.

```
some(function ($value) { return $value > 10; }, array(5, 20, 30));
=> true

some(function ($value) { return $value > 10; }, array(5, 8, 9));
=> false
```

<a name="to_array"></a>
### f\to_array





```

```

<a name="validate"></a>
### f\validate





```

```

<a name="validate_collection"></a>
### f\validate_collection





```

```

<a name="validate_collection_or_throw"></a>
### f\validate_collection_or_throw





```

```

<a name="values"></a>
### f\values

values($collection)

Returns an array with the values of collection.

```
values(array('one' => 1, 'two' => 2, 'three' => 3));
=> array(1, 2, 3)
```
