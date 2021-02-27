<?php

namespace App\Entities;

use CodeIgniter\Entity;

/**
 * Description of Recipe
 * 
 * @author agnes
 * 
 * @property string $nom Nom de la recette
 */
class Tag Extends Entity {

    protected $attributes = [
        'id' => null,
        'nom' => null, // Nom en base de données
        'created_at' => null,
        'updated_at' => null,
    ];
    
    
    protected $datamap = [
        'name' => 'nom',
    ];

}
