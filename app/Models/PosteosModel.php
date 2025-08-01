<?php 

namespace App\Models;

use CodeIgniter\Model;

class PosteosModel extends Model
{

    protected $table      = 'posteos';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['titulo', 'descripcion', 'img', 'url', 'activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edicion';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
