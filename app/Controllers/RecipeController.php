<?php

namespace App\Controllers;
use App\Models\ModelRecipe;

/**
 * Description of RecipeController
 *
 * @author agnes
 */
class RecipeController extends BaseController{

    /**
     * Afficher toutes les recettes
     * @return View
     */
    public function index() {
        $model = new ModelRecipe();
        $lists = $model->findAll();
        return view('recipe/all_recipes', [
            'recipes' => $lists
                ]);
    }

}
