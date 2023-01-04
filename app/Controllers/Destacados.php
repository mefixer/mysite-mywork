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
        $productos = $this->productos->where('destacado', $activo)->findAll();

        $data = ['titulo' => 'Lista de destacados', 'productos' => $productos];

        echo view('header');
        echo view('destacados/destacados', $data);
        echo view('footer');
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

}
