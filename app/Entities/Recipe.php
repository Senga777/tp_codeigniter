<?php

namespace App\Entities;

use CodeIgniter\Entity;

/**
 * Description of Recipe
 * 
 * @author agnes
 * @property int $id Primary key
 * @property string $name Nom de la recette
 */
class Recipe Extends Entity {
   

    /**
     * Liste des attributs de Tag
     * @var array{id:int|null,nom:string|null}
     */
    protected $attributes = [
        'id' => null,
        'nom' => null, // Nom en base de données
    ];
    
    /**
     * Fait correspondre les noms des attributs
     * @var array<string,string>
     */
    protected $datamap = [
        'name' => 'nom',
    ];

}
