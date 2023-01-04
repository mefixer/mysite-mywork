<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PortadasModel;
use CodeIgniter\CLI\Console;

class Portadas extends BaseController
{
    protected $portadas;
    protected $reglas;

    public function __construct()
    {
        $this->portadas = new PortadasModel();
        helper(['form']);
        $this->reglas = [
            'titulo' => [
                'rules' => 'required',
                'errors' => ['required' => 'Es necesario ingresar un titulo']
            ],
            'descripcion' => [
                'rules' => 'required',
                'errors' => ['required' => 'Es necesario ingresar el nombre corto']
            ]

        ];
    }

    public function index()
    {
        $portadas = $this->portadas->where('activo', 1)->findAll();

        $data = ['titulo' => 'Lista de portadas', 'portadas' => $portadas];

        echo view('header');
        echo view('portadas/portadas', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        $data = ['titulo' => 'Agregar una portada'];

        echo view('header');
        echo view('portadas/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {

            $img = $this->request->getFile('imagen_portada');
            $img->move('./img/portadas', $img->getName());

            $this->portadas->save([
                'titulo' => $this->request->getPost('titulo'),
                'descripcion' => $this->request->getPost('descripcion'),
                'img' => $img->getName()
            ]);
            return redirect()->to(base_url() . '/portadas');
        } else {
            $data = ['titulo' => 'Agregar una portada', 'validation' => $this->validator];
            echo view('header');
            echo view('portadas/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id, $valid = NULL)
    {
        $portada = $this->portadas->where('id', $id)->first();

        if ($valid != NULL) {
            $data = ['titulo' => 'Editar portada', 'datos' => $portada, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar portada', 'datos' => $portada];
        }

        echo view('header');
        echo view('portadas/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        $id = $this->request->getPost('id');
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {
            if ($this->request->getFile('imagen_portada') == null) {
                $img = $this->request->getFile('imagen_portada');
                $img->move('./img/portadas', $img->getName());
                $this->portadas->update(
                    $id,
                    [
                        'titulo' => $this->request->getPost('titulo'),
                        'descripcion' => $this->request->getPost('descripcion'),
                        'img' => $img->getName()
                    ]
                );
            } else {
                $this->portadas->update(
                    $id,
                    [
                        'titulo' => $this->request->getPost('titulo'),
                        'descripcion' => $this->request->getPost('descripcion')
                    ]
                );
            }
            return redirect()->to(base_url() . '/portadas');
        } else {
            $this->editar($id);
        }
    }

    public function check($id)
    {
        $portada = $this->portadas->where('id', $id)->first();

        if ($portada['activo'] == 0) {
            $this->portadas->update($id, ['activo' => 0]);
            return redirect()->to(base_url() . '/portadas');
        } else {
            $this->portadas->update($id, ['activo' => 1]);
            return redirect()->to(base_url() . '/portadas');
        }
    }
    public function eliminados(){
        $portadas = $this->portadas->where('activo', 0)->findAll();

        $datos = ['titulo' => 'Lista de portadas eliminadas', 'portadas' => $portadas];

        echo view('header');
        echo view('portadas/eliminados', $datos);
        echo view('footer');
    }
}
