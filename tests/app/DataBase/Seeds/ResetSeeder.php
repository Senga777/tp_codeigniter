<?php

/*
 * Agnes@needemand
 */

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Description of ResetSeeder
 *
 * @author agnes
 */
class ResetSeeder extends Seeder {

    public function run() {
        parent::run();
        $recettesTags = $this->db->table('tag_recette');
        $recettesTags->emptyTable();
        $recette = $this->db->table('recette');
        $recette->emptyTable();
        $auteur = $this->db->table("utilisateur");
        $auteur->emptyTable();
        $tag = $this->db->table("tag");
        $tag->emptyTable();
    }

}
