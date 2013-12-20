<?php

namespace felpado\tests;

use felpado as f;

class validate_collection_or_throwTest extends felpadoTestCase
{
    public function testItDoesNotThrowWithoutErrors()
    {
        f\validate_collection_or_throw(array('a' => 1), array('a' => f\optional('is_int')));
    }

    /**
     * @expectedException \Exception
     */
    public function testItThrowsWithErrors()
    {
        f\validate_collection_or_throw(array('a' => 1), array('a' => f\required('is_float')));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsCustomException()
    {
        f\validate_collection_or_throw(array('a' => 1), array('a' => f\optional('is_float')), 'InvalidArgumentException');
    }
}
