<?php 

namespace App\Models;

use CodeIgniter\Model;

class RegionesModel extends Model
{

    protected $table      = 'regiones';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'abreviatura', 'activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edicion';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
