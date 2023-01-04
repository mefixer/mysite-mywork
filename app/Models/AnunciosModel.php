<?php 

namespace App\Models;

use CodeIgniter\Model;

class AnunciosModel extends Model
{

    protected $table      = 'anuncios';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['titulo', 'descripcion', 'img',  'activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edicion';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
 