<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Tag;

/**
 * @author agnes
 */
class ModelTag extends Model {

    protected $table = "tag";

    /**
     *
     * @var array<string>
     */
    protected $allowedFields = [
        'nom', 'slug'
    ];
    protected $returnType = 'App\Entities\Tag';
    protected $useTimestamps = true;
    
    protected $validationRules = [
        'nom' => 'required|alpha_numeric_space|min_length[3]',
        'slug' => 'required|alpha_numeric|min_length[2]|is_unique[tag.slug]',
    ];
    protected $validationMessages = [
        'slug' => [
            'is_unique' => 'Désolé. Ce tag est déjà pris. Veuillez en choisir un autre.'
        ]
    ];
     protected $skipValidation     = false;

    /**
     * `id_tag`, `id_recette`
     * @param int $id_recipe
     * @return array<Tag>
     */
    public function findAllTags(int $id_recipe) {
        $builder = $this->db->table('tag');
        $builder->select('tag.*');
        $builder->join('tag_recette', 'tag_recette.id_tag = tag.id');
        $builder->where('tag_recette.id_recette', $id_recipe);
        $query = $builder->get();
        if ($query == false) {
            $tags = [];
        } else {
            $tags = $query->getResult(Tag::class);
        }

        return $tags;
    }

    /**
     * 
     * @param int $id_tag
     * @param int $id_recipe
     * @return bool
     */
    public function addTagForRecipe(int $id_tag, int $id_recipe) {
        $builder = $this->db->table('tag_recette');
        return $builder->ignore(true)->insert(['id_recette' => $id_recipe, 'id_tag' => $id_tag]) != false;
    }

    /**
     * 
     * @param string $tag_name
     * @return int
     */
    public function findOrCreate(string $tag_name): int {
        /**
         * @var Tag|null $tag
         */
        $tag = $this->where('slug', slugify($tag_name))->first();
        if ($tag == null) {
            $tag = new Tag();
            $tag->fill([
                'nom' => ucfirst($tag_name),
                'slug' => slugify($tag_name)
            ]);
            $this->insert($tag);
            $id_tag = (int) $this->getInsertID();
        } else {
            $id_tag = $tag->id;
        }
        return $id_tag;
    }

    /**
     * 
     * @param int $id_tag
     * @param int $id_recipe
     * @return bool 
     */
    public function removeTag(int $id_tag, int $id_recipe): bool {
        $builder = $this->db->table('tag_recette');
        $verdict = ($builder->delete([
                    'id_tag' => $id_tag,
                    'id_recette' => $id_recipe
                ]) != false);
        return $verdict;
    }

}
