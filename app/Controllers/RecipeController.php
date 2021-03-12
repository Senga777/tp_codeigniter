<?php

namespace App\Controllers;

use App\Models\ModelRecipe;
use App\Models\ModelTag;
use DateTime;
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
    public function read(int $id) {
        helper(['form']);
        $session = session();

        $model = new ModelRecipe();
        $recipe = $model->find($id);

        $modelTag = new ModelTag();
        $tags = $modelTag->findAllTags($id);

        return view('recipe/one_recipe', [
            'recipe' => $recipe,
            'tags' => $tags,
            'session' => $session
        ]);
    }

    /**
     * Ajouter un tag à une recette
     * @param int  $id
     * @return string
     */
    public function addTag() {
        $session = session();
        if (!$this->validate([
                    'new_tag' => 'required|min_length[3]',
                    'recipe_id' => 'required|numeric',
                ])) {
            $session->setFlashdata('errors', $this->validator->listErrors());  // Enregistre les messages d'erreur
        } else {
            $s = false;
            $tag_name = $this->request->getPost('new_tag'); // On récupère les valeurs du post
            $id_recipe = $this->request->getPost('recipe_id');
            if ($this->addTagLogic($id_recipe, $tag_name)) {
                $session->setFlashdata('success', true);
            }
        }
        return redirect()->back();
    }

    /**
     * Cette fonction n'est pas utiliser pour les URL
     * @param int $id_recipe
     * @param string $tag_name
     * @return bool
     */
    private function addTagLogic(int $id_recipe, string $tag_name): bool {
        $modelTag = new ModelTag();
        $session = session();
        $verdict = false;

        $id_tag = $modelTag->findOrCreate($tag_name); // Trouver ou créer un tag
        if (!$id_tag) {
            // Une erreur s'est produite à la création du Tag
            $session->setFlashdata('errors', $modelTag->errors());
        } else {
            // On l'associe le tag  à la recette
            if ($modelTag->addTagForRecipe($id_tag, $id_recipe) == false) {
                // Une erreur s'est produite à l'association du Tag
                $session->setFlashdata('errors', $modelTag->errors());
            } else {
                $verdict = true;
            }
        }
        return $verdict;
    }

    /**
     * Recu depuis une requete Ajax
     * @return void
     */
    public function deleteTag() {
        $data = [];
        $data['success'] = false;
        // On vérifie la validité des valeurs recus du formulaire POST
        if ($this->validate([
                    'id_recipe' => 'required|numeric',
                    'id_tag' => 'required|numeric'
                ])) {

            $model = new ModelTag();

            $success = $model->removeTag(
                    $this->request->getPost('id_tag'),
                    $this->request->getPost('id_recipe'));

            if ($success) {
                // rafraichissement du token CSRF
                $data['csrf_token'] = csrf_hash();
                $data['success'] = true;
            }
        } else {
            $data['errors'] = $this->validator;
        }
        
        // Pour retourner du Json
        header('Content-Type: application/json');
        echo json_encode($data);
        die;
    }

}
