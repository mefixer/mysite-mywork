<?php 

namespace App\Models;

use CodeIgniter\Model;

class Detalle_pedidoModel extends Model
{

    protected $table      = 'detalle_pedido';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_pedidos', 'id_productos', 'cantidad'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edicion';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
