<?php

namespace App;

use CodeIgniter\Test\CIUnitTestCase;

/**
 * Description of MyTest
 *
 * @author agnes
 */
class DataBaseTest extends CIUnitTestCase {
    
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertSame($expected, $a + $b);
    }

    public function additionProvider()
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 2, 3]
        ];
    }
}
