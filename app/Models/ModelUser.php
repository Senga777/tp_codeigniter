<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of ModelAuthor
 *
 * @author agnes
 */
class ModelUser extends Model {

    protected $table = "utilisateur";
    protected $allowedFields = [
        'nom'
    ];
    protected $returnType = 'App\Entities\User';
    protected $useTimestamps = true;

}
