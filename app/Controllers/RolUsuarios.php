<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RolUsuariosModel;

class RolUsuarios extends BaseController
{
    protected $rolusuarios;
    protected $reglas;

    public function __construct()
    {
        $this->rolusuarios = new RolUsuariosModel();
        helper(['form']);
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
        $rolusuarios = $this->rolusuarios->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Lista de rol de usuarios', 'datos' => $rolusuarios];

        echo view('header');
        echo view('rolusuarios/rolusuarios', $data);
        echo view('footer');
    }
    public function eliminados($activo = 0)
    {
        $rolusuarios = $this->rolusuarios->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Lista de rol de usuario eliminadas', 'datos' => $rolusuarios];

        echo view('header');
        echo view('rolusuarios/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $data = ['titulo' => 'Agregar una rol de usuario'];

        echo view('header');
        echo view('rolusuarios/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {
            $this->rolusuarios->save([
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion')
            ]);
            return redirect()->to(base_url() . '/rolusuarios');
        } else {
            $data = ['titulo' => 'Agregar un rol de usuario', 'validation' => $this->validator];
            echo view('header');
            echo view('rolusuarios/nuevo', $data);
            echo view('footer');
        }
    }
    public function editar($id, $valid = NULL)
    {
        $rolusuario = $this->rolusuarios->where('id', $id)->first();

        if ($valid != NULL) {
            $data = ['titulo' => 'Editar rol de usuario', 'datos' => $rolusuario, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar rol de usuario', 'datos' => $rolusuario];
        }

        echo view('header');
        echo view('rolusuarios/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {
            $this->rolusuarios->update(
                $this->request->getPost('id'),
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'descripcion' => $this->request->getPost('descripcion')
                ]
            );
            return redirect()->to(base_url() . '/rolusuarios');
        } else {
            $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->rolusuarios->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/rolusuarios');
    }

    public function reingresar($id)
    {
        $this->rolusuarios->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/rolusuarios');
    }
}
