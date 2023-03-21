<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosModel;

class Destacados extends BaseController
{
    protected $productos;

    public function __construct()
    {
        $this->productos = new ProductosModel();
    }

    public function index($activo = 1)
    {
        $session = session();
        if (!$session->get('id_usuario')) {
            echo view('login');
        } else {
            $productos = $this->productos->where('activo', $activo)->findAll();

            $data = ['titulo' => 'Lista de productos activos', 'productos' => $productos];

            echo view('header');
            echo view('destacados/destacados', $data);
            echo view('footer');
        }
    }
    public function nuevo()
    {
        $productos = $this->productos->where('destacado', 0)->findAll();

        $data = ['titulo' => 'Lista de productos', 'productos' => $productos];

        echo view('header');
        echo view('destacados/nuevo', $data);
        echo view('footer');
    }
    public function eliminar($id)
    {
        $this->productos->update($id, ['destacado' => 0]);
        return redirect()->to(base_url() . '/destacados');
    }
    public function destacar()
    {
        $id = $this->request->getPost('id');
        $producto = $this->productos->where('id', $id)->first();
        if ($producto['destacado'] == 1) {
            $this->productos->update($id, ['destacado' => 0]);
        } else {
            $this->productos->update($id, ['destacado' => 1]);
        }


        $estado = $id;
        $json = json_encode($estado);
        return $json;
    }
}
