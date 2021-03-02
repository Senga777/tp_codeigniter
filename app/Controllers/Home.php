<?php

namespace App\Controllers;

use App\Models\ModelTag;
use CodeIgniter\Test\Fabricator;
use function dd;
use function view;

class Home extends BaseController {

    public function index() {
        $fabricator = new Fabricator(ModelRecipe::class, null, 'fr_FR');
        $fabricator->setOverrides(['id_auteur' => 1]);
        $c = $fabricator->make(10);
        dd($c);
        return view('welcome_message');
    }

}
