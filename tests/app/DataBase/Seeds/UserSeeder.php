<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Description of AutorSeeder
 * @method  \Faker\Generator faker() Générateur de données aléatoire
 * @author agnes
 */
class UserSeeder extends Seeder {

    /**
     * @return mixed
     */
    public function run() {
        parent::run();
        $data = [
            'id' => 1,
            'nom' => static::faker()->name('f'),
            'id_role' => 1,
        ];
        $builder = $this->db->table('utilisateur');
        $builder->insert($data);
    }

}
