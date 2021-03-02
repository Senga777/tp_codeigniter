<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Description of RecipeSeeder
 *
 * @author agnes
 */
class RecipeSeeder extends Seeder {

    public function run() {
        parent::run();
        $data = [
            [
                'id' => 1,
                'nom' => 'Tarte',
                'id_auteur' => 1,
            ],
            [
                'id' => 2,
                'nom' => 'Crepes',
                'id_auteur' => 1,
            ],
        ];
        $this->db->table('recette')->insertBatch($data);
    }

}
