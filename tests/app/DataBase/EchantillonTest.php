<?php

namespace App\Database;

use CodeIgniter\Test\CIDatabaseTestCase;

/**
 * Description of EchantillonTest
 *
 * @author agnes
 */
class EchantillonTest extends CIDatabaseTestCase {

    function testTags() {
        $this->seeNumRecords(2, 'tag', []);
        $this->seeNumRecords(2, 'recette', []);
    }

}
