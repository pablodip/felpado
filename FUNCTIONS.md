# Functions

[assoc](#assoc), [conjoin](#conjoin), [construct](#construct), [contains](#contains), [containsStrict](#containsStrict), [every](#every), [each](#each), [filter](#filter), [find](#find), [first](#first), [key](#key), [groupBy](#groupBy), [keys](#keys), [last](#last), [map](#map), [method](#method), [property](#property), [rest](#rest), [reverse](#reverse), [some](#some), [values](#values)

<a name="assoc"></a>
### assoc

`assoc($collection, $key, $value)`

Returns an array based on collection with value added and keyed.

```
conjoin(array('a' => 1, 'b' => 2), 'c', 3);
=> array(array('a' => 1, 'b' => 2, 'c' => 3))
```

<a name="conjoin"></a>
### conjoin

`conjoin($collection, $value)`

Returns an array based on collection with value added.

```
conjoin(array(1, 2, 3), 4);
=> array(1, 2, 3, 4)
```

<a name="construct"></a>
### construct

`construct($first, $rest)`

Returns an array with first and rest.

```
construct(1, array(2, 3, 4));
=> array(1, 2, 3, 4)
```

<a name="contains"></a>
### contains

`contains($collection, $key)`

Returns true if the key is present in the collection, otherwise false.
The comparison is done with the normal comparison operator `==`.

```
contains(array('a' => 1, 'b' => 2), 'a');
=> true
```

<a name="containsStrict"></a>
### containsStrict

`contains_strict($collection, $key)`

Same than `containts` but uses the strict comparison operator `===`.

```
// strict comparison operator ===
contains(array(1 => 'a', 2 => 'b'), '1');
=> false
```

<a name="every"></a>
### every

`every($callback, $collection)`

Returns true if callback applied to all values of collection returns logical true, otherwise false.

```
every(function ($value) { return $value > 10; }, array(20, 30, 40));
=> true
```

<a name="each"></a>
### each

`feach($callback, $collection)`

Iterates over collection calling callback for each value.

```
feach(function ($value, $key) { do_something($value, $key) }, array(1, 2, 3));
=> null
```

<a name="filter"></a>
### filter

`filter($callback, $collection)`

Returns an array with the values of collection that appled to callback return logical true.

```
filter(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> array(2, 4, 6)
```

<a name="find"></a>
### find

`find($callback, $collection)`

Returns the first value that returns logical true applied to callback. otherwise null.

```
find(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> 2
```

<a name="first"></a>
### first

`first($collection)`

Returns the first value of collection, or null if collection is empty.

```
first(array(1, 2, 3));
=> 1
```

<a name="key"></a>
### key

`fkey($key)`

Returns a closure that returns the value of an array with the given key.

```
$key = fkey('foo');
$key(array('foo' => 2, 'bar' => 4));
=> 2
```

<a name="groupBy"></a>
### groupBy

`group_by($callback, $collection)`

Returns an array with the values of collection keyed by the result of callback on each value.

```
group_by('strlen', array('one', 'two', 'three'));
=> array(3 => array('one', 'two'), 5 => array('three'))
```

<a name="keys"></a>
### keys

`keys($collection)`

Returns an array with the keys of collection.

```
keys(array('one' => 1, 'two' => 2, 'three' => 3));
=> array('one', 'two', 'three')
```

<a name="last"></a>
### last

`last($collection)`

Returns the last value of collection, or null if collection is empty.

```
last(array(1, 2, 3));
=> 3
```

<a name="map"></a>
### map

`map($callback, $collection)`

Returns an array with callback applied to each value of collection.

```
map(function ($element) { return $element * 2; }, array(1, 2, 3));
=> array(2, 4, 6)
```

<a name="method"></a>
### method

`method($method)`

Returns a closure that calls the given method and returns its value in an object.

```
// here Object accept the id in the constructor and returns it through the getId method
$getId = method('getId');
$getId(new Object(2));
=> 2
```

<a name="property"></a>
### property

`property($property)`

Returns a closure that returns the given property of an object.

```
// here Object accept the id in the constructor and returns it through the id property
$id = property('id');
$id(new Object(2));
=> 2
```

<a name="rest"></a>
### rest

`rest($collection)`

Returns an array with the values of collection after the first.
It returns an empty array if collection is empty or has only one value.

```
rest(array(1, 2, 3, 4, 5));
=> array(2, 3, 4, 5)
```

<a name="reverse"></a>
### reverse

`reverse($collection)`

Returns an array with collection in the reverse order.

```
rest(array(1, 2, 3));
=> array(3, 2, 1)
```

<a name="some"></a>
### some

`some($callback, $collection)`

Returns true if callback applied to any value of collection returns logical true, otherwise false.

```
some(function ($value) { return $value > 10; }, array(5, 20, 30));
=> true
```

<a name="values"></a>
### values

`values($collection)`

Returns an array with the values of collection.

```
values(array('one' => 1, 'two' => 2, 'three' => 3));
=> array(1, 2, 3)
```