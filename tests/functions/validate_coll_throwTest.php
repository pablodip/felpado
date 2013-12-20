<?php

namespace felpado\tests;

use felpado as f;

class validate_coll_throwTest extends felpadoTestCase
{
    public function testItDoesNotThrowWithoutErrors()
    {
        f\validate_coll_throw(array('a' => 1), array('a' => f\optional('is_int')));
    }

    /**
     * @expectedException \Exception
     */
    public function testItThrowsWithErrors()
    {
        f\validate_coll_throw(array('a' => 1), array('a' => f\required('is_float')));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsCustomException()
    {
        f\validate_coll_throw(array('a' => 1), array('a' => f\optional('is_float')), 'InvalidArgumentException');
    }
}
