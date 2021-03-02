<?php

namespace App\Models;

use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\Fabricator;

/**
 * Description of ModelTagTest
 *
 * @author agnes
 */
class ModelTagTest extends CIDatabaseTestCase {

    protected $refresh = true;
    protected $seed = 'TestSeeder';
    protected $seedOnce = true;
    protected $basePath = 'tests/app/Database/';

    public function testCreateAdd() {
        $model = new ModelTag();

        $model->createAdd("Chocolat au lait", 2);
        $criteria = [
            'slug' => 'chocolat-au-lait',
            'nom' => 'Chocolat au lait'
        ];
        $this->seeInDatabase('tag', $criteria);
    }

    public function testFindAllTags() {
        $model = new ModelTag();
        $model->findAllTags(1);
        $this->seeNumRecords(10, 'tag_recette', ['id_recette' => 1]);
    }

    protected function setUp(): void {
        parent::setUp();
    }

}
