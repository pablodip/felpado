# Functions

[assoc](#assoc), [conjoin](#conjoin), [construct](#construct), [contains](#contains), [contains_strict](#contains_strict), [every](#every), [feach](#feach), [filter](#filter), [find](#find), [first](#first), [fkey](#fkey), [fmax](#fmax), [fmin](#fmin), [foldl](#foldl), [group_by](#group_by), [keys](#keys), [last](#last), [map](#map), [method](#method), [property](#property), [reduce](#reduce), [rest](#rest), [reverse](#reverse), [select](#select), [some](#some), [to_array](#to_array), [values](#values)

<a name="assoc"></a>
### assoc

``



```

```

<a name="conjoin"></a>
### conjoin

`conjoin($collection, $value)`

Returns a new collection with value added at the end.

```
conjoin(array(1, 2, 3), 4);
=> array(1, 2, 3, 4)
```

<a name="construct"></a>
### construct

`f\construct($first, $rest)`

Returns a new collection with first and rest.

```
f\construct(1, array(2, 3, 4))
=> array(1, 2, 3, 4)
```

<a name="contains"></a>
### contains

`f\contains($collection, $searched)`

Returns true if searched is present in the given collection, otherwise false.
The comparison is done with the normal comparison operator `==`.

```
f\contains(array(1, 2, 3), 1)
=> true
```

<a name="contains_strict"></a>
### contains_strict

`f\contains_strict($collection, $searched)`

Same than `containts` but use the strict comparison operator `===`.

```
// strict comparison operator ===
f\contains(array(1, 2, 3), '1')
=> false
```

<a name="every"></a>
### every

``



```

```

<a name="feach"></a>
### feach

`f\each($callback, $collection)`

Iterates over collection calling callback for each element.

```
f\each(function ($value, $key) {
   // do something
}, array(1, 2, 3));
=> null
```

<a name="filter"></a>
### filter

``



```

```

<a name="find"></a>
### find

``



```

```

<a name="first"></a>
### first

``



```

```

<a name="fkey"></a>
### fkey

``



```

```

<a name="fmax"></a>
### fmax

``



```

```

<a name="fmin"></a>
### fmin

``



```

```

<a name="foldl"></a>
### foldl

``



```

```

<a name="group_by"></a>
### group_by

``



```

```

<a name="keys"></a>
### keys

``



```

```

<a name="last"></a>
### last

``



```

```

<a name="map"></a>
### map

``



```

```

<a name="method"></a>
### method

``



```

```

<a name="property"></a>
### property

``



```

```

<a name="reduce"></a>
### reduce

``



```

```

<a name="rest"></a>
### rest

``



```

```

<a name="reverse"></a>
### reverse

``



```

```

<a name="select"></a>
### select

``



```

```

<a name="some"></a>
### some

``



```

```

<a name="to_array"></a>
### to_array

``



```

```

<a name="values"></a>
### values

``



```

```