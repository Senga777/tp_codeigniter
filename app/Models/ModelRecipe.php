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



}
