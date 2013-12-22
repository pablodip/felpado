# Functions

[_](#_), [array_depth](#array_depth), [assoc](#assoc), [assoc_in](#assoc_in), [collection_depth](#collection_depth), [collection_in](#collection_in), [compose](#compose), [conjoin](#conjoin), [construct](#construct), [contains](#contains), [contains_in](#contains_in), [contains_strict](#contains_strict), [dissoc](#dissoc), [drop_last](#drop_last), [each](#each), [every](#every), [fill](#fill), [fill_validating_normalizing_or_throw](#fill_validating_normalizing_or_throw), [fill_validating_or_throw](#fill_validating_or_throw), [filter](#filter), [find](#find), [first](#first), [foldl](#foldl), [get](#get), [get_in](#get_in), [get_or_throw](#get_or_throw), [group_by](#group_by), [identity](#identity), [is_coll](#is_coll), [key](#key), [keys](#keys), [last](#last), [map](#map), [max](#max), [method](#method), [min](#min), [normalize_collection](#normalize_collection), [not](#not), [not_callback](#not_callback), [operator](#operator), [optional](#optional), [partial](#partial), [partial_merge_args](#partial_merge_args), [property](#property), [reduce](#reduce), [rename_key](#rename_key), [rename_keys](#rename_keys), [required](#required), [rest](#rest), [reverse](#reverse), [select](#select), [some](#some), [to_array](#to_array), [validate](#validate), [validate_collection](#validate_collection), [validate_collection_or_throw](#validate_collection_or_throw), [values](#values)

<a name="_"></a>
### f\_





```

```

<a name="array_depth"></a>
### f\array_depth





```

```

<a name="assoc"></a>
### f\assoc

assoc($collection, $key, $value)

Returns an array based on collection with value added and keyed.

```
conjoin(array('a' => 1, 'b' => 2), 'c', 3);
=> array(array('a' => 1, 'b' => 2, 'c' => 3))
```

<a name="assoc_in"></a>
### f\assoc_in





```

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





```

```

<a name="conjoin"></a>
### f\conjoin

conjoin($collection, $value)

Returns an array based on collection with value added.
G
conjoin(array(1, 2, 3), 4);
=> array(1, 2, 3, 4)

```

```

<a name="construct"></a>
### f\construct

construct($first, $rest)

Returns an array with first and rest.

```
construct(1, array(2, 3, 4));
=> array(1, 2, 3, 4)
```

<a name="contains"></a>
### f\contains

contains($collection, $key)

Returns true if the key is present in the collection, otherwise false.
The comparison is done with the normal comparison operator `==`.

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





```

```

<a name="contains_strict"></a>
### f\contains_strict

contains_strict($collection, $key)

Same than `containts` but uses the strict comparison operator `===`.

```
// strict comparison operator ===
contains(array(1 => 'a', 2 => 'b'), '1');
=> false
```

<a name="dissoc"></a>
### f\dissoc





```

```

<a name="drop_last"></a>
### f\drop_last





```

```

<a name="each"></a>
### f\each

feach($callback, $collection)

Iterates over collection calling callback for each value.

```
feach(function ($value, $key) { do_something($value, $key) }, array(1, 2, 3));
=> null
```

<a name="every"></a>
### f\every

every($callback, $collection)

Returns true if callback applied to all values of collection returns logical true, otherwise false.

```
every(function ($value) { return $value > 10; }, array(20, 30, 40));
=> true

every(function ($value) { return $value > 10; }, array(5, 20, 30));
=> false
```

<a name="fill"></a>
### f\fill





```

```

<a name="fill_validating_normalizing_or_throw"></a>
### f\fill_validating_normalizing_or_throw





```

```

<a name="fill_validating_or_throw"></a>
### f\fill_validating_or_throw





```

```

<a name="filter"></a>
### f\filter

filter($callback, $collection)

Returns an array with the values of collection that appled to callback return logical true.

```
filter(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> array(2, 4, 6)
```

<a name="find"></a>
### f\find

find($callback, $collection)

Returns the first value that returns logical true applied to callback. otherwise null.

```
find(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> 2

find(function ($value) { return $value % 2 == 0; }, array(1, 3, 5);
=> null
```

<a name="first"></a>
### f\first

first($collection)

Returns the first value of collection, or null if collection is empty.

```
first(array(1, 2, 3));
=> 1

first(array());
=> null
```

<a name="foldl"></a>
### f\foldl





```

```

<a name="get"></a>
### f\get





```

```

<a name="get_in"></a>
### f\get_in





```

```

<a name="get_or_throw"></a>
### f\get_or_throw





```

```

<a name="group_by"></a>
### f\group_by

group_by($callback, $collection)

Returns an array with the values of collection keyed by the result of callback on each value.

```
group_by('strlen', array('one', 'two', 'three'));
=> array(3 => array('one', 'two'), 5 => array('three'))
```

<a name="identity"></a>
### f\identity





```

```

<a name="is_coll"></a>
### f\is_coll





```

```

<a name="key"></a>
### f\key

fkey($key)

Returns a closure that returns the value of an array with the given key.

```
$key = fkey('foo');
$key(array('foo' => 2, 'bar' => 4));
=> 2

map(fkey('foo'), array(
    array('foo' => 2, 'bar' => 4),
    array('foo' => 6, 'bar' => 8),
))
=> array(2, 6)
```

<a name="keys"></a>
### f\keys

keys($collection)

Returns an array with the keys of collection.

```
keys(array('one' => 1, 'two' => 2, 'three' => 3));
=> array('one', 'two', 'three')
```

<a name="last"></a>
### f\last

last($collection)

Returns the last value of collection, or null if collection is empty.

```
last(array(1, 2, 3));
=> 3

last(array());
=> null
```

<a name="map"></a>
### f\map

map($callback, $collection)

Returns an array with callback applied to each value of collection.

```
map(function ($element) { return $element * 2; }, array(1, 2, 3));
=> array(2, 4, 6)
```

<a name="max"></a>
### f\max





```

```

<a name="method"></a>
### f\method

method($method)

Returns a closure that calls the given method and returns its value in an object.

```
// here Object accept the id in the constructor and returns it through the getId method
$getId = method('getId');
$getId(new Object(2));
=> 2

// useful with another functions
map(method('getId'), array(new Object(2), new Object(6)))
=> array(2, 6)
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
