<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class Post extends BaseController
{
    protected $post;
    protected $reglas;

    public function __construct()
    {
        $this->post = new PostModel();
        helper(['form']);
        $this->reglas = [
            'titulo' => ['rules' => 'required', 'errors' => ['required' => 'Es necesario ingresar un titulo']],
            'descripcion' => ['rules' => 'required', 'errors' => ['required' => 'Es necesario ingresar una descripcion']]
        ];
    }

    public function index($activo = 1)
    {
        $session = session();
        if (!$session->get('id_usuario')) {
            echo view('login');
        } else {
            $post = $this->post->where('activo', $activo)->findAll();

            $data = ['titulo' => 'Lista de post', 'datos' => $post];

            echo view('header');
            echo view('post/post', $data);
            echo view('footer');
        }
    }
    public function eliminados($activo = 0)
    {
        $post = $this->post->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Lista de post eliminadas', 'datos' => $post];

        echo view('header');
        echo view('post/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $data = ['titulo' => 'Agregar un post'];

        echo view('header');
        echo view('post/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {

            $img = $this->request->getFile('imagen_intermedio');
            $img->move('./img/post', $img->getName());

            $this->post->save([
                'titulo' => $this->request->getPost('titulo'),
                'descripcion' => $this->request->getPost('descripcion'),
                'img' => $img->getName()
            ]);
            return redirect()->to(base_url() . 'post');
        } else {
            $data = ['titulo' => 'Agregar un Intermedio', 'validation' => $this->validator];
            echo view('header');
            echo view('post/nuevo', $data);
            echo view('footer');
        }
    }
    public function editar($id, $valid = NULL)
    {
        $unidad = $this->post->where('id', $id)->first();

        if ($valid != NULL) {
            $data = ['titulo' => 'Editar Unidad', 'datos' => $unidad, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad];
        }

        echo view('header');
        echo view('post/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if (!$this->request->getFile('imagen_intermedio') === NULL) {

            $this->post->update(
                $this->request->getPost('id'),
                [
                    'titulo' => $this->request->getPost('titulo'),
                    'descripcion' => $this->request->getPost('descripcion')
                ]
            );
            return redirect()->to(base_url() . 'post');
        } else {

            $img = $this->request->getFile('imagen_intermedio');
            $img->move('./img/post', $img->getName());

            // $intermedio = $this->post->where('id', $this->request->getPost('id'))->first();

            // $imgAnterior = $intermedio['img'];
            // $imgAnterior->removeFile('./img/post', $imgAnterior->getName());

            $this->post->update(
                $this->request->getPost('id'),
                [
                    'titulo' => $this->request->getPost('titulo'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'img' => $img->getName()
                ]
            );
            return redirect()->to('post');
        }
    }

    public function eliminar($id)
    {
        $this->post->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . 'post');
    }

    public function reingresar($id)
    {
        $this->post->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . 'post');
    }
}
