<?php

namespace App\Models;

use CodeIgniter\Test\CIDatabaseTestCase;
use function count;

/**
 * Tester la classe ModelTag
 * @author agnes
 */
class ModelTagTest extends CIDatabaseTestCase {

    /**
     *
     * @var bool $refresh
     */
    protected $refresh = true;

    /**
     * @var string|array<string> $seed
     */
    protected $seed = 'TestSeeder';
    /**
     *
     * @var bool $seedOnce
     */
    protected $seedOnce = true;
    /**
     *
     * @var string @basePath
     */
    protected $basePath = 'tests/app/Database/';
    
    
    /**
     * My attributes
     * @var ModelTag 
     */
    private ModelTag $model;

    /**
     * 
     * @return void
     */
    public function testFindAllTags(): void {
        $tags = $this->model->findAllTags(1);
        $this->assertEquals(2, count($tags));
    }

    /**
     * 
     * @return void
     */
    public function testFindOrCreate(): void {
        $criteria = [
            'nom' => 'Chocolat au lait'
        ];
        $this->dontSeeInDatabase('tag', $criteria);
        $id = $this->model->findOrCreate("Chocolat au lait");
        $this->seeInDatabase('tag', $criteria);

        /**
         * @var \App\Entities\Tag $tag
         */
        $tag = $this->model->find($id);
        $this->assertEquals('Chocolat au lait', $tag->name);
        $this->assertEquals('chocolat-au-lait', $tag->slug);
    }

    /**
     * 
     * @return void
     */
    protected function testAddTagForRecipe(): void {
        $v1 = $this->model->addTagForRecipe(1, 2);
        $this->assertEquals(true, $v1);
        $this->seeInDatabase("tag_recette", ["id_tag" => 1, 'id_recette' => 2]);
        $v2 = $this->model->addTagForRecipe(1, 2);
        $this->assertEquals(false, $v2);
        $this->seeNumRecords(2, 'tag_recette', ['id_recette' => 1]);
    }

    /**
     * Appelé au début du test :
     * {@inheritDoc}
     * @return void
     */
    protected function setUp(): void {
        parent::setUp();
        $this->model = new ModelTag();
        $builder = $this->db->table("tag");
        $builder->where('slug', 'chocolat-au-lait')->delete();
    }

    /**
     * Appelé à la fin du test :
     * {@inheritDoc}
     * @return void
     */
    protected function tearDown(): void {
        parent::tearDown();
        $builder = $this->db->table("tag");
        $builder->delete(["slug" => "chocolat-au-lait"]);
    }

}
