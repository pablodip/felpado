<?php

namespace felpado\tests;

use felpado as f;

class validate_coll_or_throwTest extends felpadoTestCase
{
    public function testItDoesNotThrowWithoutErrors()
    {
        f\validate_coll_or_throw(array('a' => 1), array(
            'a' => f\optional(array('v' => 'is_int'))
        ));
    }

    /**
     * @expectedException \Exception
     */
    public function testItThrowsWithErrors()
    {
        f\validate_coll_or_throw(array('a' => 1), array(
            'a' => f\required(array('v' => 'is_float'))
        ));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsCustomException()
    {
        f\validate_coll_or_throw(array('a' => 1), array(
            'a' => f\optional(array('v' => 'is_float'))
        ), 'InvalidArgumentException');
    }
}
