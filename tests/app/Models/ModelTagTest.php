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
    private ModelTag $model;
    

    

    public function testFindAllTags() {
        $tags = $this->model->findAllTags(1);
        $this->assertEquals(2, count($tags));
    }

    public function testFindOrCreate() {
        //$model = new ModelTag();
        $criteria = [
            'nom' => 'Chocolat au lait'
        ];
        $this->dontSeeInDatabase('tag', $criteria);
        $id = $this->model->findOrCreate("Chocolat au lait");
        $this->seeInDatabase('tag', $criteria);

        $tag = $this->model->find($id);
        $this->assertEquals('Chocolat au lait', $tag->name);
        $this->assertEquals('chocolat-au-lait', $tag->slug);
    }
    
    protected  function testAddTagForRecipe(){
        $v1 = $this->model->addTagForRecipe(1, 2);
        $this->assertEquals(true, $v1);
        $this->seeInDatabase("tag_recette", ["id_tag" => 1, 'id_recette' => 2]);
        $v2 = $this->model->addTagForRecipe(1, 2);
        $this->assertEquals(false, $v2);
        $this->seeNumRecords(2, 'tag_recette', ['id_recette' => 1]);
        $this->seeNumRecords(2, 'tag_recette', ['id_recette' => 1]);
        
    }
    
    

    protected function setUp(): void {
        parent::setUp();
        $this->model = new ModelTag();
        $builder = $this->db->table("tag");
        $builder->where('slug', 'chocolat-au-lait')->delete();
    }

    protected function tearDown(): void {
        parent::tearDown();
        $builder = $this->db->table("tag");
        $builder->delete( ["slug" => "chocolat-au-lait"]);
    }

}
