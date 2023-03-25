<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosModel;
use App\Models\UnidadesModel;
use App\Models\CategoriasModel;
use App\Models\ImagenesModel;

class Productos extends BaseController
{
    protected $productos;
    protected $unidades;
    protected $categorias;

    protected $imagenes;
    protected $reglas;

    public function __construct()
    {
        $this->productos = new ProductosModel();
        $this->unidades = new UnidadesModel();
        $this->categorias = new CategoriasModel();
        $this->imagenes = new ImagenesModel();

        helper(['form']);

        $this->reglas = [
            'codigo' => [
                'rules' => 'required|is_unique[productos.codigo]',
                'errors' => [
                    'required' => 'Es necesario ingresar un código.',
                    'is_unique' => 'El código debe ser único.'
                ]
            ],
            'nombre' => [
                'rules' => 'required|max_length[50]|min_length[3]',
                'errors' => [
                    'required' => 'Es necesario ingresar un nombre.',
                    'max_length' => 'Es necesario ingresar un nombre.'
                ]
            ],
            'precio_venta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar el precio de venta.'
                ]
            ],
            'precio_compra' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar el precio de compra.'
                ]
            ],
            'existencias' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar la cantidad de existencias.'
                ]
            ],
            'stock_minimo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar el stock minimo de productos.'
                ]
            ],
            'id_unidad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario seleccionar una unidad de medida.'
                ]
            ],
            'id_categoria' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario seleccionar una categoria de producto.'
                ]
            ]
        ];
    }
    public function index($activo = 1)
    {

        $session = session();
        if (!$session->get('id_usuario')) {
            return redirect()->to('login');
        } else {
            $productos = $this->productos->where('activo', $activo)->findAll();
            $imagenes = $this->imagenes->where('activo', $activo)->findAll();
            $data = ['titulo' => 'Lista de productos', 'productos' => $productos, 'imagenes' => $imagenes];
            echo view('header');
            echo view('productos/productos', $data);
            echo view('footer');
        }
    }
    public function eliminados($activo = 0)
    {
        $productos = $this->productos->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Lista de productos eliminados', 'datos' => $productos];

        echo view('header');
        echo view('productos/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $activo = 1;
        $unidades = $this->unidades->where('activo', $activo)->findAll();
        $categorias = $this->categorias->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Agregar un producto', 'unidades' => $unidades, 'categorias' => $categorias];

        echo view('header');
        echo view('productos/nuevo', $data);
        echo view('footer');
    }
    public function insertar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {

            $img = $this->request->getFile('imagen_producto');
            $img->move('./img/productos', $img->getName());

            $this->productos->save([
                'codigo' => $this->request->getPost('codigo'),
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),
                'precio_venta' => $this->request->getPost('precio_venta'),
                'precio_compra' => $this->request->getPost('precio_compra'),
                'existencias' => $this->request->getPost('existencias'),
                'stock_minimo' => $this->request->getPost('stock_minimo'),
                'inventariable' => $this->request->getPost('inventariable'),
                'id_unidad' => $this->request->getPost('id_unidad'),
                'id_categoria' => $this->request->getPost('id_categoria'),
                'img' => $img->getName()
            ]);
            return redirect()->to(base_url() . '/productos');
        } else {
            $activo = 1;
            $unidades = $this->unidades->where('activo', $activo)->findAll();
            $categorias = $this->categorias->where('activo', $activo)->findAll();

            $data = ['titulo' => 'Agregar un producto', 'unidades' => $unidades, 'categorias' => $categorias, 'validation' => $this->validator];
            echo view('header');
            echo view('productos/nuevo', $data);
            echo view('footer');
        }
    }
    public function editar($id)
    {
        $activo = 1;
        $unidades = $this->unidades->where('activo', $activo)->findAll();
        $categorias = $this->categorias->where('activo', $activo)->findAll();
        $producto = $this->productos->where('id', $id)->first();

        $data = ['titulo' => 'Editar producto', 'unidades' => $unidades, 'categorias' => $categorias, 'producto' => $producto];

        echo view('header');
        echo view('productos/editar', $data);
        echo view('footer');
    }
    public function imagen($id)
    {
        $producto = $this->productos->where('id', $id)->first();
        $imagenes = $this->imagenes->where('id_producto', $id)->findAll();

        $data = ['titulo' => 'Agregar una nueva imagen al producto', 'producto' => $producto, 'imagenes' => $imagenes];

        echo view('header');
        echo view('productos/imagen', $data);
        echo view('footer');
    }
    public function addimagen($id)
    {
        $img = $this->request->getFile('add_imagen_producto');
        $img->move('./img/imagenes', $img->getName());

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->imagenes->save([
                'id_producto' => $id,
                'ruta' => $img->getName()
            ]);
            $productos = $this->productos->where('activo', 1)->findAll();
            $imagenes = $this->imagenes->where('activo', 1)->findAll();
            $data = ['titulo' => 'Lista de productos', 'productos' => $productos, 'imagenes' => $imagenes];
            echo view('header');
            echo view('productos/productos', $data);
            echo view('footer');
        } else {
            $producto = $this->productos->where($id)->first();
            $data = ['titulo' => 'Agregar una nueva imagen al producto', 'producto' => $producto];

            echo view('header');
            echo view('productos/imagen', $data);
            echo view('footer');
        }
    }
    public function actualizar()
    {
        if (!$this->request->getFile('imagen_producto') == NULL) {
            $img = $this->request->getFile('imagen_producto');
            $img->move(base_url() . '/img/productos', $img->getName());

            $producto = $this->productos->where('id', $this->request->getPost('id'))->first();

            $imgAnterior = $producto['img'];
            $imgAnterior->removeFile(base_url() . '/img/productos', $imgAnterior->getName());

            $this->productos->update(
                $this->request->getPost('id'),
                [
                    'codigo' => $this->request->getPost('codigo'),
                    'nombre' => $this->request->getPost('nombre'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'precio_venta' => $this->request->getPost('precio_venta'),
                    'precio_compra' => $this->request->getPost('precio_compra'),
                    'existencias' => $this->request->getPost('existencias'),
                    'stock_minimo' => $this->request->getPost('stock_minimo'),
                    'inventariable' => $this->request->getPost('inventariable'),
                    'id_unidad' => $this->request->getPost('id_unidad'),
                    'id_categoria' => $this->request->getPost('id_categoria'),
                    'img' => $this->request->getPost($img->getName())
                ]
            );
            return redirect()->to(base_url() . '/productos');
        } else {
            $this->productos->update(
                $this->request->getPost('id'),
                [
                    'codigo' => $this->request->getPost('codigo'),
                    'nombre' => $this->request->getPost('nombre'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'precio_venta' => $this->request->getPost('precio_venta'),
                    'precio_compra' => $this->request->getPost('precio_compra'),
                    'existencias' => $this->request->getPost('existencias'),
                    'stock_minimo' => $this->request->getPost('stock_minimo'),
                    'inventariable' => $this->request->getPost('inventariable'),
                    'id_unidad' => $this->request->getPost('id_unidad'),
                    'id_categoria' => $this->request->getPost('id_categoria')
                ]
            );
            return redirect()->to(base_url() . '/productos');
        }
    }
    public function eliminar($id)
    {
        $this->productos->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . 'productos');
    }
    public function reingresar($id)
    {
        $this->productos->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . 'productos');
    }
}
