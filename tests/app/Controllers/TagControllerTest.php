<?php

namespace App\Controllers;

use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\ControllerTester;
use function base_url;

class TagControllerTest extends CIDatabaseTestCase
{
    use ControllerTester;

    public function testShowTags()
    {
        $result = $this->withURI('http://127.0.0.1/www/codeigniter/tp_codeigniter_3/public/tags')
                       ->controller(TagController::class)
                       ->execute('showTags');

        $this->assertTrue($result->isOK());
    }
}