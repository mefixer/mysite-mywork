<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnunciosModel;

class Anuncios extends BaseController
{
    protected $anuncios;
    protected $reglas;

    public function __construct()
    {
        $this->anuncios = new AnunciosModel();
        helper(['form']);
        $this->reglas = [
            'titulo' => ['rules' => 'required', 'errors' => ['required' => 'Es necesario ingresar el titulo']]
        ];
    }

    public function index($activo = 1)
    {
        $session = session();
        if (!$session->get('id_usuario')) {
            echo view('login');
        } else {
            $anuncios = $this->anuncios->where('activo', $activo)->findAll();

            $data = ['titulo' => 'Lista de anuncios', 'datos' => $anuncios];

            echo view('header');
            echo view('anuncios/anuncios', $data);
            echo view('footer');
        }
    }
    public function eliminados($activo = 0)
    {
        $anuncios = $this->anuncios->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Lista de anuncios eliminadas', 'datos' => $anuncios];

        echo view('header');
        echo view('anuncios/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $data = ['titulo' => 'Agregar un anuncio'];

        echo view('header');
        echo view('anuncios/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        $titulo = $this->request->getPost('titulo_anuncios');
        $descripcion = $this->request->getPost('descripcion_anuncios');


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $img = $this->request->getFile('imagen_intermedio');
            $img->move('./img/anuncios', $img->getName());

            $this->anuncios->save([
                'titulo' => $titulo,
                'descripcion' => $descripcion,
                'img' => $img->getName()
            ]);
            return redirect()->to(base_url() . 'anuncios');
        } else {
            $data = ['titulo' => 'Agregar un anuncios', 'validation' => $this->validator];
            echo view('header');
            echo view('anuncios/nuevo', $data);
            echo view('footer');
        }
    }
    public function editar($id, $valid = NULL)
    {
        $anuncio = $this->anuncios->where('id', $id)->first();

        if ($valid != NULL) {
            $data = ['titulo' => 'Editar anuncio', 'datos' => $anuncio, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar anuncio', 'datos' => $anuncio];
        }

        echo view('header');
        echo view('anuncios/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {
            $this->anuncios->update($this->request->getPost('id'), ['nombre' => $this->request->getPost('nombre'), 'nombre_corto' => $this->request->getPost('nombre_corto')]);
            return redirect()->to(base_url() . '/anuncios');
        } else {
            $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->anuncios->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/anuncios');
    }

    public function reingresar($id)
    {
        $this->anuncios->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/anuncios');
    }
}
