<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientesModel;
use App\Models\PortadasModel;
use App\Models\PostModel;
use App\Models\ProductosModel;
use App\Models\ImagenesModel;
use App\Models\AnunciosModel;
use App\Models\PosteosModel;
use App\Models\RegionesModel;
use App\Models\CiudadesModel;
use App\Models\PedidosModel;
use App\Models\EstadoPedidosModel;
use App\Models\Detalle_PedidoModel;
use App\Models\EnviosModel;
use App\Libraries\Cart;


class Tienda extends BaseController
{
    protected $portadas;
    protected $post;
    protected $productos;
    protected $imagenes;
    protected $anuncios;
    protected $posteos;
    protected $regiones;
    protected $ciudades;
    protected $envios;
    protected $clientes;
    protected $pedidos;
    protected $detalle_pedido;
    protected $cart;
    protected $reglas;
    protected $estado_pedido;

    public function __construct()
    {
        $this->portadas = new PortadasModel();
        $this->post = new PostModel();
        $this->productos = new ProductosModel();
        $this->imagenes = new ImagenesModel();
        $this->anuncios = new AnunciosModel();
        $this->clientes = new ClientesModel();
        $this->posteos = new PosteosModel();
        $this->regiones = new RegionesModel();
        $this->ciudades = new CiudadesModel();
        $this->envios = new EnviosModel();
        $this->pedidos = new PedidosModel();
        $this->detalle_pedido = new Detalle_PedidoModel();
        $this->cart = new Cart;
        $this->estado_pedido = new EstadoPedidosModel();

        helper(['form']);

        $this->reglas = [
            'nombre_cliente' => [
                'rules' => 'required|max_length[50]|min_length[3]',
                'errors' => [
                    'required' => 'Es necesario ingresar un nombre.',
                    'max_length' => 'El nombre es muy largo.'
                ]
            ],
            'apellidos_cliente' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario que ingrese sus apellidos'
                ]
            ],
            'rut_cliente' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar su Rut'
                ]
            ],
            'direccion_cliente' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingrese su direccion'
                ]
            ],
            'casa_cliente' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar su numero de casa o departamento'
                ]
            ],
            'postal_cliente' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingrese su codigo postal'
                ]
            ],
            'region_cliente' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario seleccionar una region'
                ]
            ],
            'ciudad_cliente' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario seleccionar una ciudad.'
                ]
            ],
            'telefono_cliente' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingrese su telefono de contacto'
                ]
            ]
        ];
    }
    public function index($activo = 1)
    {
        $portadas = $this->portadas->where('activo', $activo)->findAll();
        $post = $this->post->where('activo', $activo)->findAll();
        $productos = $this->productos->where('destacado', $activo)->findAll();
        $anuncios = $this->anuncios->where('activo', $activo)->findAll();
        $posteos = $this->posteos->where('activo', $activo)->findAll();
        $items = $this->cart->total_items();
        $data = [
            'titulo' => 'Lista de portadas',
            'portadas' => $portadas,
            'post' => $post,
            'productos' => $productos,
            'anuncios' => $anuncios,
            'posteos' => $posteos
        ];

        $dato = ['items' => $items];
        echo view('tienda/head', $dato);
        echo view('tienda/body', $data);
        echo view('tienda/footer');
    }

    public function producto($id)
    {
        $producto = $this->productos->where('id', $id)->first();
        $imagenes = $this->imagenes->where('id_producto', $id)->findAll();
        $items = $this->cart->total_items();

        $data = [
            'titulo' => 'Producto seleccionado',
            'producto' => $producto,
            'imagenes' => $imagenes,
            'items' => $items
        ];
        echo view('tienda/productos/producto', $data);
        echo view('tienda/footer');
    }

    public function lista()
    {
        $productos = $this->productos->where('activo', 1)->findAll();
        $items = $this->cart->total_items();

        $data = [
            'titulo' => 'Nuestra lista de productos',
            'productos' => $productos,
            'items' => $items
        ];
        echo view('tienda/productos/lista', $data);
        echo view('tienda/footer');
    }

    public function insertar($id)
    {

        $producto = $this->productos->where('id', $id)->first();

        $cantidad = 1;

        $data = [
            'id' => $id,
            'qty' => $cantidad,
            'price' => $producto['precio_venta'],
            'name' => $producto['nombre']
        ];

        $this->cart->insert($data);

        $this->lista();
    }
    public function ver()
    {
        $productos = array();
        $contenido = $this->cart->contents();
        $total = 0;
        foreach ($contenido as $content) :
            $producto = $this->productos->where('id', $content['id'])->first();
            array_push($producto, $content['qty']);
            array_push($producto, $content['rowid']);
            $total += $content['subtotal'];
            array_push($productos, $producto);
        endforeach;

        $items = $this->cart->total_items();
        $data = [
            'titulo' => 'Productos que tienes seleccionados!',
            'productos' => $productos,
            'items' => $items,
            'total' => $total
        ];

        echo view('tienda/productos/pedido', $data);
        echo view('tienda/footer');

    }
    public function quitar($id)
    {
        $productos = array();
        $cart_content = $this->cart->contents();
        
        foreach ($cart_content as $content) :
            if ($content['id'] == $id) {
                $this->cart->remove($content['rowid']);
            }
        endforeach;

        $productos = array();
        $contenido = $this->cart->contents();
        $total = 0;
        foreach ($contenido as $content) :
            $producto = $this->productos->where('id', $content['id'])->first();
            array_push($producto, $content['qty']);
            $total += $content['subtotal'];
            array_push($productos, $producto);
        endforeach;

        $items = $this->cart->total_items();
        $data = [
            'titulo' => 'Productos que tienes seleccionados!',
            'productos' => $productos,
            'items' => $items,
            'total' => $total
        ];
        echo view('tienda/productos/pedido', $data);
        echo view('tienda/footer');
    }
    public function realizar()
    {
        if ($this->cart->contents() == null) {
            $productos = array();
            $contenido = $this->cart->contents();
            $total = 0;

            foreach ($contenido as $content) :
                $producto = $this->productos->where('id', $content['id'])->first();
                array_push($producto, $content['qty']);
                array_push($producto, $content['rowid']);
                $total += $content['subtotal'];
                array_push($productos, $producto);
            endforeach;

            $items = $this->cart->total_items();
            $data = [
                'titulo' => 'Tu lista de productos',
                'productos' => $productos,
                'items' => $items,
                'total' => $total
            ];

            echo view('tienda/productos/pedido', $data);
            echo view('tienda/footer');
        } else {
            $productos = array();
            $contenido = $this->cart->contents();
            $subtotal = 0;
            $regiones = $this->regiones->where('activo', 1)->findAll();

            foreach ($contenido as $content) :
                $producto = $this->productos->where('id', $content['id'])->first();
                array_push($producto, $content['qty']);
                $subtotal += $content['subtotal'];
                array_push($productos, $producto);
            endforeach;

            $items = $this->cart->total_items();

            $data = [
                'titulo' => 'Informacion de contacto',
                'productos' => $productos,
                'items' => $items,
                'subtotal' => $subtotal,
                'regiones' => $regiones
            ];
            echo view('tienda/productos/info', $data);
            echo view('tienda/footer');
        }
    }
    public function continuar()
    {
        //se extrae los datos enviados desde el formulario 
        //consultando primero por el tipo de peticion y validado los datos
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {
            $nombre = $this->request->getPost('nombre_cliente');
            $apellidos = $this->request->getPost('apellidos_cliente');
            $rut = $this->request->getPost('rut_cliente');
            $email = $this->request->getPost('email_cliente');
            $direccion = $this->request->getPost('direccion_cliente');
            $casa = $this->request->getPost('casa_cliente');
            $codigo_postal = $this->request->getPost('postal_cliente');
            $ciudad = $this->request->getPost('ciudad_cliente');
            $telefono = $this->request->getPost('telefono_cliente');

            $cliente = $this->clientes->where('rut', $rut)->first();

            if ($cliente == NULL) {

                $this->clientes->save([
                    'nombre' => $nombre,
                    'apellidos' => $apellidos,
                    'rut' => $rut,
                    'email' => $email,
                    'direccion' => $direccion,
                    'casa' => $casa,
                    'codigo_postal' => $codigo_postal,
                    'id_ciudad' => $ciudad,
                    'telefono' => $telefono
                ]);

                $clienteId = $this->clientes->getInsertID();
                $cliente = $this->clientes->where('id', $clienteId)->first();
            }else{
                $id_cliente = $cliente['id'];
                $this->clientes->update($id_cliente, [
                    'id_ciudad' => $ciudad,
                    'direccion' => $direccion,
                    'casa' => $casa,
                    'codigo_postal' => $codigo_postal,
                ]);
                $cliente = $this->clientes->where('rut', $rut)->first();
            }

            $nombreciudad = $this->ciudades->where('id', $ciudad)->first();
            $nombreregion = $this->regiones->where('id', $nombreciudad['id_region'])->first();
            
            $productos = array();
            $contenido = $this->cart->contents();
            $subtotal = 0;

            foreach ($contenido as $content) :
                $producto = $this->productos->where('id', $content['id'])->first();
                $producto['cantidad'] = $content['qty'];
                $subtotal += $content['subtotal'];
                array_push($productos, $producto);
            endforeach;

            $items = $this->cart->total_items();

            $envios = $this->envios->where('activo', 1)->findAll();

            $data = [
                'titulo' => 'Selecciona el metodo de envío',
                'productos' => $productos,
                'ciudad' => $nombreciudad,
                'region' => $nombreregion,
                'items' => $items,
                'envios' => $envios,
                'subtotal' => $subtotal,
                'cliente' => $cliente
            ];

            echo view('tienda/productos/envio', $data);
            echo view('tienda/footer');
        } else {
            $productos = array();
            $contenido = $this->cart->contents();
            $subtotal = 0;
            $regiones = $this->regiones->where('activo', 1)->findAll();

            foreach ($contenido as $content) :
                $producto = $this->productos->where('id', $content['id'])->first();
                array_push($producto, $content['qty']);
                $subtotal += $content['subtotal'];
                array_push($productos, $producto);
            endforeach;

            $items = $this->cart->total_items();

            $data = [
                'titulo' => 'Informacion de contacto',
                'productos' => $productos,
                'items' => $items,
                'subtotal' => $subtotal,
                'regiones' => $regiones,
                'validation' => $this->validator
            ];

            echo view('tienda/productos/info', $data);
            echo view('tienda/footer');
        }
    }
    public function finalizar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $rut = $this->request->getPost('rut_cliente');
            $cliente = $this->clientes->where('rut', $rut)->first();
            $envio = $this->request->getPost('radio_envio');
            $estado = $this->estado_pedido->where('nombre', 'Ingresado')->first();

            $this->pedidos->save([
                'id_clientes' => $cliente['id'],
                'id_envios' => $envio,
                'id_estado' => $estado['id']
            ]);

            $pedido = $this->pedidos->getInsertID();

            $contenido = $this->cart->contents();

            foreach ($contenido as $content) :
                $producto = $this->productos->where('id', $content['id'])->first();
                $cantidad = $producto['existencias'];
                $this->detalle_pedido->save([
                    'id_pedidos' => $pedido,
                    'id_productos' => $content['id'],
                    'cantidad' => $content['qty']
                ]);

                $existencias = $cantidad - $content['qty'];
                $dato = array(
                    'existencias' => $existencias
                );

                $this->productos->update($content['id'], $dato);

            endforeach;

            $productos = array();
            $contenido = $this->cart->contents();
            $subtotal = 0;

            foreach ($contenido as $content) :
                $producto = $this->productos->where('id', $content['id'])->first();
                array_push($producto, $content['qty']);
                $subtotal += $content['subtotal'];
                array_push($productos, $producto);
            endforeach;

            $items = $this->cart->total_items();

            $envios = $this->envios->where('id', $envio)->first();
            $valorEnvio = $envios['valor'];
            $total = $subtotal + $valorEnvio;
            // Clear the shopping cart
            $this->cart->destroy();

            $nombreciudad = $this->ciudades->where('id', $cliente['id_ciudad'])->first();
            $nombreregion = $this->regiones->where('id', $nombreciudad['id_region'])->first();

            $data = [
                'titulo' => 'Tu pedido se a realizado con éxito',
                'pedido' => $pedido,
                'productos' => $productos,
                'items' => $items,
                'envios' => $envios,
                'total' => $total,
                'cliente' => $cliente,
                'ciudad' => $nombreciudad,
                'region' => $nombreregion
            ];

            echo view('tienda/productos/pdf', $data);
            echo view('tienda/footer');
        }
    }
    public function ciudad()
    {
        $region = $this->request->getPost('id');
        $ciudadesRegion = $this->ciudades->where('id_region', $region)->findAll();
        $ciudades = array();
        foreach ($ciudadesRegion as $ciudad) {
            array_push($ciudades, array(
                'id' => $ciudad['id'],
                'nombre' => $ciudad['nombre']
            ));
        }
        $json = json_encode($ciudades);
        return $json;
    }
    public function buscarut()
    {
        $rut = $this->request->getPost('rut');
        $clientes = $this->clientes->where('rut', $rut)->first();
        $cliente = array();

        array_push($cliente, array(
            'id' => $clientes['id'],
            'nombre' => $clientes['nombre'],
            'apellidos' => $clientes['apellidos'],
            'rut' => $rut,
            'email' => $clientes['email'],
            'direccion' => $clientes['direccion'],
            'casa' => $clientes['casa'],
            'codigo_postal' => $clientes['codigo_postal'],
            'id_ciudad' => $clientes['id_ciudad'],
            'telefono' => $clientes['telefono']
        ));

        $json = json_encode($clientes);
        return $json;
    }
}
