<?php

/*
 * Agnes@needemand
 */

namespace App\Controllers;

use App\Models\ModelRecipe;
use App\Models\ModelTag;
use function view;

/**
 * Description of TagController
 *
 * @author agnes
 */
class TagController extends BaseController {

    public function showTags() {
        $model = new ModelTag();
        $tags = $model->findAll();
        return view('tag/all_tags', ['tags' => $tags]);
    }

    public function showRecipesByTag($id) {
        $modelTag = new ModelTag();
        $tag = $modelTag->find($id);
        $modelRecipe = new ModelRecipe();
        $recipes = $modelRecipe->findByTag($id);
        return view('recipe/all_recipes', ['recipes' => $recipes, 'tag' => $tag]);
    }

}
