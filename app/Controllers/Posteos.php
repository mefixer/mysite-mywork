<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PosteosModel;

class Posteos extends BaseController
{
    protected $posteos;
    protected $reglas;

    public function __construct()
    {
        $this->posteos = new PosteosModel();
        helper(['form']);
        $this->reglas = [
            'url' => ['rules' => 'required', 'errors' => ['required' => 'Es necesario ingresar la url']]
        ];
    }

    public function index($activo = 1)
    {
        $posteos = $this->posteos->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Lista de posteos', 'datos' => $posteos];

        echo view('header');
        echo view('posteos/posteos', $data);
        echo view('footer');
    }
    public function eliminados($activo = 0)
    {
        $posteos = $this->posteos->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Lista de posteos eliminadas', 'datos' => $posteos];

        echo view('header');
        echo view('posteos/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $data = ['titulo' => 'Agregar un posteo'];

        echo view('header');
        echo view('posteos/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {
            $this->posteos->save([
                'nombre' => $this->request->getPost('nombre'),
                'nombre_corto' => $this->request->getPost('nombre_corto')
            ]);
            return redirect()->to(base_url() . '/posteos');
        } else {
            $data = ['titulo' => 'Agregar un posteo', 'validation' => $this->validator];
            echo view('header');
            echo view('posteos/nuevo', $data);
            echo view('footer');
        }
    }
    public function editar($id, $valid = NULL)
    {
        $posteo = $this->posteos->where('id', $id)->first();

        if ($valid != NULL) {
            $data = ['titulo' => 'Editar posteo', 'datos' => $posteo, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar posteo', 'datos' => $posteo];
        }

        echo view('header');
        echo view('posteos/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {
            $this->posteos->update($this->request->getPost('id'), ['nombre' => $this->request->getPost('nombre'), 'nombre_corto' => $this->request->getPost('nombre_corto')]);
            return redirect()->to(base_url() . '/posteos');
        } else {
            $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->posteos->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/posteos');
    }

    public function reingresar($id)
    {
        $this->posteos->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/posteos');
    }
}
