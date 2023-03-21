<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PedidosModel;
use App\Models\Detalle_pedidoModel;
use App\Models\ProductosModel;

class Mascomprados extends BaseController
{
    protected $pedidos;
    protected $detalle_pedidos;
    protected $productos;

    public function __construct()
    {
        $this->pedidos = new PedidosModel();
        $this->detalle_pedidos = new Detalle_pedidoModel();
        $this->productos = new ProductosModel();
    }
    public function index()
    {
        $session = session();
        if (!$session->get('id_usuario')) {
            echo view('login');
        } else {
            //Se busca mostrar los productos en un grafico
            $db = db_connect();

            $query = $db->query(
                'SELECT 
        productos.nombre as producto, 
        SUM(detalle_pedido.cantidad) as cantidad_vendida 
            FROM detalle_pedido 
        JOIN pedidos ON detalle_pedido.id_pedidos = pedidos.id 
        JOIN productos on detalle_pedido.id_productos = productos.id 
        
        GROUP BY productos.nombre 
        ORDER BY SUM(detalle_pedido.cantidad) 
        DESC;'
            );

            $productos = array();
            foreach ($query->getResult() as $row) {
                $data = [
                    'producto' => $row->producto,
                    'cantidad' => $row->cantidad_vendida
                ];
                array_push($productos, $data);
            }

            // $productos = $this->productos->where('activo', $activo)->findAll();
            // $imagenes = $this->imagenes->where('activo', $activo)->findAll();
            $data = ['titulo' => 'Lista de productos', 'productos' => $productos];

            echo view('header');
            echo view('estadistica/productos', $data);
            echo view('footer');
        }
    }
    function actualiza_estado()
    {
        $estado = $this->request->getPost('estado');
        $pedido = $this->request->getPost('pedido');

        $this->pedidos->update(
            $pedido,
            [
                'id_estado' => $estado
            ]
        );
        return json_encode('Se a actualizado el estado');
    }
}
