<?php

namespace App\Entities;

use CodeIgniter\Entity;

/**
 * Description of Tag
 * 
 * @author agnes
 * @property string $name Nom du Tag
 * @property string $slug Slug associé au nom du tag 
 * @property int $id Primary key
 */
class Tag Extends Entity {
    


    /**
     * Liste des attributs de Tag
     * @var array{id:int|null,nom:string|null,slug:string|null,created_at:\Datetime|null,updated_at:\Datetime|null}
     */
    protected $attributes = [
        'id' => null,
        'nom' => null, // Nom en base de données
        'slug' => null,
        'created_at' => null,
        'updated_at' => null,
    ];
    /**
     * Fait correspondre les noms des attributs
     * @var array<string,string>
     */
    protected $datamap = [
        'name' => 'nom',
    ];

   

   
}
