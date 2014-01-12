<?php

namespace felpado\tests;

use felpado as f;

class flattenTest extends felpadoTestCase
{
    /**
     * @dataProvider provideFlatten
     */
    public function testFlatten($exp, $coll)
    {
        $this->assertSame($exp, f\flatten($coll));
    }

    public function provideFlatten()
    {
        return $this->buildExpectedCollArgsProvider(array(
            array(array(1, 2, 3), array(1, 2, 3)),
            array(array(1, 2, 3), array(1, array(2, 3))),
            array(array(1, 2, 3, 4, 5), array(1, array(2, array(3, 4), 5)))
        ));
    }
}
