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
     * 
     * @return string
     */
    public function showTags() {
        $model = new ModelTag();
        $tags = $model->findAll();
        return view('tag/all_tags', ['tags' => $tags]);
    }

    /**
     * 
     * @param int  $id
     * @return string
     */
    public function showRecipesByTag(int $id) {
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
     * Exemple de redirection
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
        // redirection + info de success :
        return redirect()->back();
    }

    /**
     * @return void
     */
    public function deleteTag() {
        $data = [];
        if ($this->validate([
                    'id_recipe' => 'required|numeric',
                    'id_tag' => 'required|numeric'
                ])) {

            $model = new ModelTag();
            $data['success'] = $model->removeTag(
                    $this->request->getPost('id_tag'),
                    $this->request->getPost('id_recipe'));
        } else {
            $data['errors'] = $this->validator;
            $data['success'] = false;
        }
        header('Content-Type: application/json');
        echo json_encode($data);
        die;
    }

}
