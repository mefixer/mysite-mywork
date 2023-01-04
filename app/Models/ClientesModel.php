<?php 

namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model
{

    protected $table      = 'clientes';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nombre', 
        'apellidos',
        'rut',
        'email',
        'direccion',
        'casa',
        'codigo_postal',
        'id_ciudad',
        'telefono',
        'activo'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edicion';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


}
