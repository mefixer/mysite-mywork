<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{

    protected $table      = 'productos';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'codigo',
        'nombre',
        'descripcion',
        'precio_venta',
        'precio_compra',
        'existencias',
        'stock_minimo',
        'inventariable',
        'id_unidad',
        'id_categoria',
        'img',
        'destacado',
        'activo'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edicion';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
