<?php 

namespace App\Models;

use CodeIgniter\Model;

class EstadoPedidosModel extends Model
{

    protected $table      = 'estado_pedido';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'descripcion', 'activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edicion';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
