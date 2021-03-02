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
        $data = [
            [
                'id' => 1,
                'nom' => 'Chocolat',
                'slug' => 'chocolat',
            ],
            [
                'id' => 2,
                'nom' => 'Fruit',
                'slug' => 'fruit',
            ],
        ];
        $this->db->table('tag')->insertBatch($data);
        
        $builder = $this->db->table('tag_recette');
        $builder->insertBatch([
            ['id_tag' => 1, 'id_recette' => 1], 
            ['id_tag' => 2, 'id_recette' => 1]
        ]);
    }

}
