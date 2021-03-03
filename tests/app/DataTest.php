<?php

namespace App;

use CodeIgniter\Test\CIUnitTestCase;

/**
 * Un simple test
 * @author agnes
 */
class DataBaseTest extends CIUnitTestCase {

    /**
     * 
     * @param int $a
     * @param int $b
     * @param int $expected
     * @return void
     * Test Unit :
     * @dataProvider additionProvider
     */
    public function testAdd(int $a, int $b, int $expected) :void{
        $this->assertSame($expected, $a + $b);
    }

    /**
     * 
     * @return array<array<int>>
     */
    public function additionProvider() {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 2, 3]
        ];
    }

}
