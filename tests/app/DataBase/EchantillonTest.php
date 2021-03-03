<?php

namespace App\Database;

use CodeIgniter\Test\CIDatabaseTestCase;

/**
 * Description of EchantillonTest
 *
 * @author agnes
 */
class EchantillonTest extends CIDatabaseTestCase {

    /**
     * Tester le nombre de données attendu dans l'enchantillon test
     * @return void
     */
    function testTags() :void {
        $this->seeNumRecords(2, 'tag', []);
        $this->seeNumRecords(2, 'recette', []);
    }

}
