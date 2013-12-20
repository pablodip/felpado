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
        $this->assertSame(array(), f\validate_coll(array('a' => 1), array('a' => f\optional('is_int'))));
        $this->assertSame(array(), f\validate_coll(array('a' => 1, 'b' => 2.0), array('a' => f\optional('is_int'), 'b' => f\optional('is_float'))));
    }

    public function testReturnsInvalidErrorWhenNotOk()
    {
        $this->assertSame(array('a' => 'invalid'), f\validate_coll(array('a' => 1), array('a' => f\optional('is_string'))));
    }

    public function testReturnsInvalidErrorPerKeyWhenNotOk()
    {
        $array = array('a' => 1, 'b' => 2.0);
        $rules = array('a' => f\optional('is_float'), 'b' => f\optional('is_int'));

        $errors = array('a' => 'invalid', 'b' => 'invalid');

        $this->assertSame($errors, f\validate_coll($array, $rules));
    }

    public function testAllowsOptionalsToNotExist()
    {
        $this->assertSame(array(), f\validate_coll(array('a' => 1), array('b' => f\optional('is_float'))));
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

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsAnExceptionWhenARuleIsNotAnInstanceOfValidationRule()
    {
        f\validate_coll(array('a' => 1), array('a' => 'is_int'));
    }
}
