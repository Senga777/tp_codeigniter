<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Description of AutorSeeder
 *
 * @author agnes
 */
class UserSeeder extends Seeder {

    public function run() {
         parent::run();
        $data = [
           'id' => 1,
            'nom' => static::faker()->name,
            'id_role' => 1,
        ];
        $builder = $this->db->table('utilisateur');
        $builder->insert($data);
    }

}
