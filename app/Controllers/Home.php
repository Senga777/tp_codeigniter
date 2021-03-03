<?php

namespace App\Controllers;

use App\Models\ModelTag;
use CodeIgniter\Test\Fabricator;
use function dd;
use function view;

class Home extends BaseController {

    /**
     * 
     * @return string
     */
    public function index() {
        return view('welcome_message');
    }

}
