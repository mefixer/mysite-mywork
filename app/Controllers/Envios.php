<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EnviosModel;

class Envios extends BaseController
{
    protected $envios;
    protected $reglas;

    public function __construct()
    {
        $this->envios = new EnviosModel();
        helper(['form']);
        $this->reglas = [
            'nombre' => ['rules' => 'required', 'errors' => ['required' => 'Es necesario ingresar un nombre']],
            'descripcion' => ['rules' => 'required', 'errors' => ['required' => 'Es necesario ingresar una descripcion']]
        ];
    }

    public function index($activo = 1)
    {
        $session = session();
        if (!$session->get('id_usuario')) {
            echo view('login');
        } else {
            $envios = $this->envios->where('activo', $activo)->findAll();

            $data = ['titulo' => 'Lista de envios', 'datos' => $envios];

            echo view('header');
            echo view('envios/envios', $data);
            echo view('footer');
        }
    }
    public function eliminados($activo = 0)
    {
        $envios = $this->envios->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Lista de envios eliminadas', 'datos' => $envios];

        echo view('header');
        echo view('envios/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $data = ['titulo' => 'Agregar un nuevo envio'];

        echo view('header');
        echo view('envios/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {
            $this->envios->save([
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),
                'valor' => $this->request->getPost('valor')
            ]);
            return redirect()->to(base_url() . '/envios');
        } else {
            $data = ['titulo' => 'Agregar un nuevo envio', 'validation' => $this->validator];
            echo view('header');
            echo view('envios/nuevo', $data);
            echo view('footer');
        }
    }
    public function editar($id, $valid = NULL)
    {
        $unidad = $this->envios->where('id', $id)->first();

        if ($valid != NULL) {
            $data = ['titulo' => 'Editar envio', 'datos' => $unidad, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar envio', 'datos' => $unidad];
        }

        echo view('header');
        echo view('envios/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {
            $this->envios->update(
                $this->request->getPost('id'),
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'descripcion' => $this->request->getPost('descripcion')
                ]
            );
            return redirect()->to(base_url() . '/envios');
        } else {
            $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->envios->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/envios');
    }

    public function reingresar($id)
    {
        $this->envios->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/envios');
    }
}
