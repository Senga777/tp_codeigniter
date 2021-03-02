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
        'nom', 'slug'
    ];
    protected $returnType = 'App\Entities\Tag';
    protected $useTimestamps = true;

    /**
     * `id_tag`, `id_recette`
     * @param int $id_recipe
     */
    public function findAllTags(int $id_recipe) {
        $db = Database::connect();
        $builder = $db->table('tag');
        $builder->select('tag.nom');
        $builder->join('tag_recette', 'tag_recette.id_tag = tag.id');
        $builder->where('tag_recette.id_recette', $id_recipe);
        $query = $builder->get();

        return $query->getResult(Tag::class);
    }

    /**
     * 
     * @param int $id_tag
     * @param int $id_recipe
     * @return bool
     */
    public function addTagForRecipe(int $id_tag, int $id_recipe) {
        $builder = $this->db->table('tag_recette');
        return $builder->replace(['id_recette' => $id_recipe, 'id_tag' => $id_tag]);
    }

    /**
     * 
     * @param string $tag_name
     * @return int
     */
    public function findOrCreate(string $tag_name): int {
        $tag = $this->where('slug', slugify($tag_name))->find();
        if (empty($tag)) {
            $tag = new Tag();
            $tag->name = $tag_name;
            $tag->slug = slugify($tag_name);
            $this->insert($tag);
            $id_tag = $this->getInsertID();
        } else {
            $id_tag = $tag->id;
        }
        return $id_tag;
    }

}
