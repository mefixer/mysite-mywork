<?php 

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{

    protected $table      = 'usuarios';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nombre', 
        'apellido',
        'nombre_usuario',
        'correo',
        'password',
        'id_rol',
        'activo'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edicion';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


}
