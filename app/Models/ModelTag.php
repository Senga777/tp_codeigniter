<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;
use App\Entities\Tag;

/**
 * TODO Description
 *
 * @author agnes
 */
class ModelTag extends Model {

    protected $table = "tag";
    protected $allowedFields = [
        'nom'
    ];
    protected $returnType = 'App\Entities\Tag';
    protected $useTimestamps = true;

    /**
     * `id_tag`, `id_recette`
     * @param type $id_recette
     */
    public function findAllTags($id_recette) {
        $db      = Database::connect();
        $builder = $db->table('tag');
        $builder->select('tag.nom');
        $builder->join('tag_recette', 'tag_recette.id_tag = tag.id');
        $builder->where('tag_recette.id_recette', $id_recette);
        $query = $builder->get();
       
        return $query->getResult(Tag::class);

    }

}
