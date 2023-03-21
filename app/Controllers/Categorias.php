<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;

class Categorias extends BaseController
{
    protected $categorias;
    protected $reglas;

    public function __construct()
    {
        $this->categorias = new CategoriasModel();
        $this->reglas = [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar un nombre'
                ]
            ]
        ];
    }

    public function index($activo = 1)
    {
        $session = session();
        if (!$session->get('id_usuario')) {
            echo view('login');
        } else {

            $categorias = $this->categorias->where('activo', $activo)->findAll();

            $data = ['titulo' => 'Lista de categorias', 'datos' => $categorias];

            echo view('header');
            echo view('categorias/categorias', $data);
            echo view('footer');
        }
    }
    public function eliminados($activo = 0)
    {
        $categoria = $this->categorias->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Categorias eliminadas', 'datos' => $categoria];

        echo view('header');
        echo view('categorias/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $data = ['titulo' => 'Agregar una categoria'];

        echo view('header');
        echo view('categorias/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {
            $this->categorias->save([
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion')
            ]);
            return redirect()->to(base_url() . '/categorias');
        } else {
            $data = ['titulo' => 'Agregar una categoria', 'validation' => $this->validator];
            echo view('header');
            echo view('categorias/nuevo', $data);
            echo view('footer');
        }
    }
    public function editar($id)
    {
        $unidad = $this->categorias->where('id', $id)->first();
        $data = ['titulo' => 'Editar Categoria', 'datos' => $unidad];

        echo view('header');
        echo view('categorias/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        $this->categorias->update(
            $this->request->getPost('id'),
            [
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion')
            ]
        );
        return redirect()->to(base_url() . '/categorias');
    }

    public function eliminar($id)
    {
        $this->categorias->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/categorias');
    }

    public function reingresar($id)
    {
        $this->categorias->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/categorias');
    }
}
