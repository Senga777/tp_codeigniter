<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of ModelRecipe
 *
 * @author agnes
 */
class ModelRecipe extends Model {

    protected $table = "recette";
    protected $allowedFields = [
        'nom'
    ];
    protected $returnType = 'App\Entities\Recipe';
    protected $useTimestamps = false;

    public function findByTag($id) {
        $builder = $this->db->table('tag_recette');
        $query = $builder->select('recette.*')
                ->join('recette', 'recette.id = tag_recette.id_recette')
                ->where('id_tag', $id)
                ->get();
        return $query->getResult();

    }

}
