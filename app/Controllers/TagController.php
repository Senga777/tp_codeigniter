<?php

namespace App\Controllers;

use App\Models\ModelRecipe;
use App\Models\ModelTag;
use App\Entities\Tag;
use CodeIgniter\HTTP\RedirectResponse;
use function redirect;
use function slugify;
use function view;

/**
 * Description of TagController
 *
 * @author agnes
 */
class TagController extends BaseController {

    /**
     * Affiche tous les tags
     * > Utilisation du model
     * @return string
     */
    public function index() {
        $model = new ModelTag();        
        /**
         * findAll() est équivalent à un SELECT * FROM tag
         * @var array<Tag> $tags
         */
        $tags = $model->findAll(); 
        return view('tag/all_tags', ['tags' => $tags]);
    }

    /**
     * Affiche un tag et ses recettes associées
     * > UTilisation de plusieurs models
     * @param int  $id
     * @return string
     */
    public function read(int $id) {
        helper('form');
        $session = session();
        $modelTag = new ModelTag();
        $tag = $modelTag->find($id);
        $modelRecipe = new ModelRecipe();
        $recipes = $modelRecipe->findByTag($id);
        return view('tag/one_tag', [
            'recipes' => $recipes,
            'tag' => $tag,
            'success' => $session->getFlashdata('success')
        ]);
    }

    /**
     * Modification d'un Tag
     * Cece doit être accéssible en POST
     * > Exemple de redirection + FlashData
     * @return RedirectResponse 
     */
    public function updateTag() {
        $success = false;
        if ($this->validate([
                    'tag_name' => 'required|alpha|min_length[2]',
                    'tag_id' => 'required|numeric'
                ])) {
            $tag = new Tag();
            $name = $this->request->getPost('tag_name');
            $tag->fill([
                'nom' => $name,
                'id' => $this->request->getPost('tag_id'),
                'slug' => slugify($name)
            ]);
            $model = new ModelTag();
            $success = $model->save($tag);
        }
        $session = session();
        $session->setFlashdata('success', true);
        return redirect()->back();
    }



}
