<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Description of TestSeeder
 *
 * @author agnes
 */
class TestSeeder extends Seeder {

    public function run() {
        parent::run();
        $this->call('ResetSeeder');
        $this->call('UserSeeder');
        $this->call("RecipeSeeder");
        $this->call("TagSeeder");
    }
}
