<?php

namespace App\Controllers;

use App\Models\ModelRecipe;
use App\Models\ModelTag;
use DateTime;
use function dd;
use function helper;
use function view;

/**
 * Description of RecipeController
 *
 * @author agnes
 */
class RecipeController extends BaseController {

    /**
     *
     * @var DateTime
     */
    protected DateTime $d;

    /**
     * Afficher toutes les recettes
     * @return string
     */
    public function index() {
        $model = new ModelRecipe();
        $lists = $model->findAll();
        return view('recipe/all_recipes', [
            'recipes' => $lists
        ]);
    }

    /**
     * 
     * @param int $id  id recu depuis l'url 
     * @return string 
     */
    public function read($id) {
        helper(['form']);

        $model = new ModelRecipe();
        $recipe = $model->find($id);

        $modelTag = new ModelTag();
        $tags = $modelTag->findAllTags($id);

        return view('recipe/one_recipe', [
            'recipe' => $recipe,
            'tags' => $tags
        ]);
    }

    public function addTag($id) {
        helper(['form']);
    

        $modelTag = new ModelTag();
        $modelRecipe = new ModelRecipe();

        $recipe = $modelRecipe->find($id);
        $data = ['recipe' => $recipe];


        $rules = [
            'new_tag' => 'required|min_length[3]',
        ];

        if (!$this->validate($rules)) {
            // Afficher les messages d'erreur
            $data['validation'] = $this->validator;
        } else {
            $tag_name = $this->request->getPost('new_tag');
            $id_tag = $modelTag->findOrCreate($tag_name);
            if ($id_tag) {
               
                
                $data['success'] = $modelTag->addTagForRecipe($id_tag, $id);
            } 


        }


        $data['tags'] = $modelTag->findAllTags($id);

        return view('recipe/one_recipe', $data);
    }

}
