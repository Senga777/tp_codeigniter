<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Entities\Recipe;

/**
 * Description of ModelRecipe
 *
 * @author agnes
 */
class ModelRecipe extends Model {

    protected $table = "recette";
    /**
     *
     * @var array<string> $allowedFields
     */
    protected $allowedFields = [
        'nom'
    ];
    protected $returnType = 'App\Entities\Recipe';
    protected $useTimestamps = false;

    /**
     * 
     * @param int $id
     * @return array<Recipe> 
     */
    public function findByTag(int $id): array {
        $builder = $this->db->table('tag_recette');
        $query = $builder->select('recette.*')
                ->join('recette', 'recette.id = tag_recette.id_recette')
                ->where('id_tag', $id)
                ->get();
        if($query == false){
            $recipes = [];
        }else{
            $recipes = $query->getResult(Recipe::class);
        }
        return $recipes;
    }

}
