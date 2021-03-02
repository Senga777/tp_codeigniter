<?php

namespace App\Database\Seeds;

use App\Models\ModelTag;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;

/**
 * Description of TagSeeder
 *
 * @author agnes
 */
class TagSeeder extends Seeder {

    public function run() {
        parent::run();
        $fabricator = new Fabricator(ModelTag::class, null, 'fr_FR');
        $tags = $fabricator->create(10);
        
        $builder = $this->db->table('tag_recette');
        $data = [];
        foreach ($tags as $tag) {
            $data[] = ['id_tag' => $tag->id, 'id_recette' => 1];
        }
        $builder->insertBatch($data);
    }

}
