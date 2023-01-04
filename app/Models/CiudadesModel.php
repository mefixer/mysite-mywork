<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadesModel extends Model
{

    protected $table      = 'ciudades';

    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'id_region', 'activo'];
    
    protected $useTimestamps = true;

    protected $createdField  = 'fecha_alta';

    protected $updatedField  = 'fecha_edicion';

    protected $validationRules    = [];

    protected $validationMessages = [];

    protected $skipValidation     = false;
}
