<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PedidosModel;
use App\Models\ClientesModel;
use App\Models\EnviosModel;
use App\Models\CiudadesModel;
use App\Models\RegionesModel;
use App\Models\Detalle_pedidoModel;
use App\Models\ProductosModel;
use App\Models\UnidadesModel;

class Pedidos extends BaseController
{
    protected $pedidos;
    protected $clientes;
    protected $envios;
    protected $ciudades;
    protected $regiones;
    protected $detalle_pedido;
    protected $productos;
    protected $unidades;

    public function __construct()
    {
        $this->pedidos = new PedidosModel();
        $this->clientes = new ClientesModel();
        $this->envios = new EnviosModel();
        $this->ciudades = new CiudadesModel();
        $this->regiones = new RegionesModel();
        $this->detalle_pedido = new Detalle_pedidoModel();
        $this->productos = new ProductosModel();
        $this->unidades = new UnidadesModel();
    }

    public function index()
    {
        $pedidos = $this->pedidos->findAll();
        $clientes = array();

        //recorrer los pedidos para mostrarlos en la vista
        //junto al cliente que le corresponde 
        //Y el tipo de envio que a elegido

        foreach ($pedidos as $content) :

            $cliente = $this->clientes->where('id', $content['id_clientes'])->first();
            $envio_pedido = $this->envios->where('id', $content['id_envios'])->first();
            $ciudad = $this->ciudades->where('id', $cliente['id_ciudad'])->first();
            $region = $this->regiones->where('id', $ciudad['id_region'])->first();
            $cliente['pedido'] = $content['id'];
            $cliente['envio_nombre'] = $envio_pedido['nombre'];
            $cliente['envio_descripcion'] = $envio_pedido['descripcion'];
            $cliente['envio_valor'] = $envio_pedido['valor'];
            $cliente['ciudad'] = $ciudad['nombre'];
            $cliente['region'] = $region['nombre'];

            array_push($clientes, $cliente);
        endforeach;

        $datos = ['titulo' => 'Lista de pedidos', 'datos' => $clientes];

        echo view('header');
        echo view('pedidos/pedidos', $datos);
        echo view('footer');
    }

    public function detalle($id)
    {
        $pedido = $this->pedidos->where('id', $id)->first();

        $productos = array();
        //recorrer los pedidos para mostrarlos en la vista
        //junto al cliente que le corresponde 
        //Y el tipo de envio que a elegido

        $cliente = $this->clientes->where('id', $pedido['id_clientes'])->first();
        $envio_pedido = $this->envios->where('id', $pedido['id_envios'])->first();
        $ciudad = $this->ciudades->where('id', $cliente['id_ciudad'])->first();
        $region = $this->regiones->where('id', $ciudad['id_region'])->first();

        $cliente['pedido'] = $pedido['id'];
        $cliente['envio_nombre'] = $envio_pedido['nombre'];
        $cliente['envio_descripcion'] = $envio_pedido['descripcion'];
        $cliente['envio_valor'] = $envio_pedido['valor'];
        $cliente['ciudad'] = $ciudad['nombre'];
        $cliente['region'] = $region['nombre'];

        $detalle = $this->detalle_pedido->where('id_pedidos', $pedido['id'])->findAll();

        foreach ($detalle as $content) :
            $product = $this->productos->where('id', $content['id_productos'])->first();
            $unidad = $this->unidades->where('id', $product['id_unidad'])->first();
            $producto['id'] = $product['id'];
            $producto['codigo'] = $product['codigo'];
            $producto['nombre'] = $product['nombre'];
            $producto['descripcion'] = $product['descripcion'];
            $producto['precio_venta'] = $product['precio_venta'];
            $producto['img'] = $product['img'];
            $producto['unidad'] = $unidad['nombre_corto'];
            $producto['cantidad'] = $content['cantidad'];
            array_push($productos, $producto);
        endforeach;


        $data = ['titulo' => 'Detalle del Pedido.', 'pedido' => $pedido ,'cliente' => $cliente, 'productos' => $productos];

        echo view('header');
        echo view('pedidos/detalle', $data);
        echo view('footer');
    }
}
