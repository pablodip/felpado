<?php

namespace felpado\tests;

use felpado as f;

class validate_collectionTest extends felpadoTestCase
{
    public function testValidateEmpty()
    {
        $this->assertSame(array(), f\validate_collection(array(), array()));
    }

    public function testValidateWithoutErrors()
    {
        $this->assertSame(array(), f\validate_collection(array('a' => 1), array(
            'a' => f\optional(array('validator' => 'is_int'))
        )));
        $this->assertSame(array(), f\validate_collection(array('a' => 1, 'b' => 2.0), array(
            'a' => f\optional(['validator' => 'is_int']),
            'b' => f\optional(['validator' => 'is_float'])
        )));
    }

    public function testReturnsInvalidErrorWhenNotOk()
    {
        $array = array('a' => 1);
        $paramRules = array('a' => f\optional(array('validator' => 'is_string')));

        $expected = array('a' => 'invalid');

        $this->assertSame($expected, f\validate_collection($array, $paramRules));
    }

    public function testReturnsInvalidErrorPerKeyWhenNotOk()
    {
        $array = array('a' => 1, 'b' => 2.0);
        $paramRules = array('a' => f\optional(array('validator' => 'is_float')), 'b' => f\optional(array('validator' => 'is_int')));

        $errors = array('a' => 'invalid', 'b' => 'invalid');

        $this->assertSame($errors, f\validate_collection($array, $paramRules));
    }

    public function testAllowsOptionalsToNotExist()
    {
        $this->assertSame(array(), f\validate_collection(array('a' => 1), array(
            'b' => f\optional(array('validator' => 'is_float'))
        )));
    }

    public function testAllowsOptionalsWithNull()
    {
        $this->assertSame(array(), f\validate_collection(array('a' => null), array(
            'a' => f\optional(array('validator' => 'is_int'))
        )));
    }

    public function testReturnsRequiredWhenNotExists()
    {
        $this->assertSame(array('a' => 'required'), f\validate_collection(array(), array(
            'a' => f\required(array('validator' => 'is_int'))
        )));
        $this->assertSame(array('a' => 'required'), f\validate_collection(array('b' => 2), array(
            'a' => f\required(array('validator' => 'is_int'))
        )));
    }

    public function testValidatesWhenRequired()
    {
        $this->assertSame(array(), f\validate_collection(array('a' => 1), array(
            'a' => f\required(array('validator' => 'is_int'))
        )));
        $this->assertSame(array('a' => 'invalid'), f\validate_collection(array('a' => 1), array(
            'a' => f\required(array('validator' => 'is_string'))
        )));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsAnExceptionWhenARuleIsNotAnInstanceOfParamRule()
    {
        f\validate_collection(array('a' => 1), array('a' => 'is_int'));
    }
}
