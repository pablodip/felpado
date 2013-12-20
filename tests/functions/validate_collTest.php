<?php

namespace felpado\tests;

use felpado as f;

class validate_collTest extends felpadoTestCase
{
    public function testValidateEmpty()
    {
        $this->assertSame(array(), f\validate_coll(array(), array()));
    }

    public function testValidateWithoutErrors()
    {
        $this->assertSame(array(), f\validate_coll(array('a' => 1), array('a' => 'is_int')));
        $this->assertSame(array(), f\validate_coll(array('a' => 1, 'b' => 2.0), array('a' => 'is_int', 'b' => 'is_float')));
    }

    public function testReturnsInvalidErrorWhenNotOk()
    {
        $this->assertSame(array('a' => 'invalid'), f\validate_coll(array('a' => 1), array('a' => 'is_string')));
    }

    public function testReturnsInvalidErrorPerKeyWhenNotOk()
    {
        $array = array('a' => 1);
        $rules = array('a' => 'is_float', 'b' => 'is_int');

        $errors = array('a' => 'invalid', 'b' => 'invalid');

        $this->assertSame($errors, f\validate_coll($array, $rules));
    }

    public function testReturnsRequiredWhenNotExists()
    {
        $this->assertSame(array('a' => 'required'), f\validate_coll(array(), array('a' => f\required('is_int'))));
        $this->assertSame(array('a' => 'required'), f\validate_coll(array('b' => 2), array('a' => f\required('is_int'))));
    }

    public function testValidatesWhenRequired()
    {
        $this->assertSame(array(), f\validate_coll(array('a' => 1), array('a' => f\required('is_int'))));
        $this->assertSame(array('a' => 'invalid'), f\validate_coll(array('a' => 1), array('a' => f\required('is_string'))));
    }
}
