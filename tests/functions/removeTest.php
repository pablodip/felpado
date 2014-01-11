<?php

namespace felpado\tests;

use felpado as f;

class removeTest extends felpadoTestCase
{
    /**
     * @dataProvider provideRemove
     */
    public function testRemove($exp, $coll, $fn)
    {
        $this->assertSame($exp, f\remove($fn, $coll));
    }

    public function provideRemove()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(1, 3, 5), range(1, 6), function ($value) { return $value % 2 == 0; })
        ));
    }
}
