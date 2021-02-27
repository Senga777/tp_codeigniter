<?php

namespace App\Controllers;

use App\Models\ModelRecipe;
use App\Models\ModelTag;
use function helper;
use function view;

/**
 * Description of RecipeController
 *
 * @author agnes
 */
class RecipeController extends BaseController {

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
            // TODO Creation du tag
            // TODO Ajoute dans la table associative
            
            // Afficher un message de succes 
            echo view('alerts/success');
        }

        $modelTag = new ModelTag();
        $data['tags'] = $modelTag->findAllTags($id);

        return view('recipe/one_recipe', $data);
    }

}
