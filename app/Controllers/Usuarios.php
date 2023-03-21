<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\RolUsuariosModel;
use CodeIgniter\CLI\Console;

class Usuarios extends BaseController
{
    protected $usuarios;
    protected $rolusuarios;
    protected $reglas, $reglasLog;

    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->rolusuarios = new RolUsuariosModel();

        helper(['form']);

        $this->reglas = [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar un nombre.'
                ]
            ],
            'apellido' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar el apellido.'
                ]
            ],
            'nombre_usuario' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar el nombre de usuario.'
                ]
            ],
            'correo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar el correo.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar la contraseña.'
                ]
            ],
            'repassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Es necesario ingresar la conraseña para confirmar.'
                ]
            ]
        ];

        $this->reglasLog = [
            'nombre_usuario' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar el nombre de usuario.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario ingresar la contraseña.'
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
            $usuarios = $this->usuarios->where('activo', $activo)->findAll();

            $data = ['titulo' => 'Lista de usuarios', 'datos' => $usuarios];

            echo view('header');
            echo view('usuarios/usuarios', $data);
            echo view('footer');
        }
    }
    public function eliminados($activo = 0)
    {
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Lista de usuarios eliminados', 'datos' => $usuarios];

        echo view('header');
        echo view('usuarios/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $activo = 1;
        $rolusuarios = $this->rolusuarios->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Agregar un usuario', 'rolusuarios' => $rolusuarios];

        echo view('header');
        echo view('usuarios/nuevo', $data);
        echo view('footer');
    }
    public function insertar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {
            $hash = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
            $this->usuarios->save([
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'nombre_usuario' => $this->request->getPost('nombre_usuario'),
                'correo' => $this->request->getPost('correo'),
                'password' => $hash,
                'id_rol' => $this->request->getPost('id_rol')
            ]);
            return redirect()->to(base_url() . '/usuarios');
        } else {
            $activo = 1;
            $rolusuarios = $this->rolusuarios->where('activo', $activo)->findAll();
            $data = [
                'titulo' => 'Agregar un usuario',
                'rolusuarios' => $rolusuarios,
                'validation' => $this->validator
            ];

            echo view('header');
            echo view('usuarios/nuevo', $data);
            echo view('footer');
        }
    }
    public function editar($id, $valid = NULL)
    {
        $usuario = $this->usuarios->where('id', $id)->first();

        if ($valid != NULL) {
            $data = ['titulo' => 'Editar usuario', 'datos' => $usuario, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar usuario', 'datos' => $usuario];
        }

        echo view('header');
        echo view('usuarios/editar', $data);
        echo view('footer');
    }
    public function actualizar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglas)) {
            $this->usuarios->update(
                $this->request->getPost('id'),
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'apellido' => $this->request->getPost('apellido'),
                    'nombre_usuario' => $this->request->getPost('nombre_usuario'),
                    'correo' => $this->request->getPost('correo'),
                    'password' => $this->request->getPost('password'),
                    'id_rol' => $this->request->getPost('id_rol')
                ]
            );
            return redirect()->to(base_url() . '/usuarios');
        } else {
            $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {
        $this->usuarios->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/usuarios');
    }
    public function reingresar($id)
    {
        $this->usuarios->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/usuarios');
    }
    public function login()
    {
        echo view('login');
    }
    public function valida()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->validate($this->reglasLog)) {

            print_r('ingresa');
            $usuario = $this->request->getPost('nombre_usuario');
            $password = $this->request->getPost('password');


            $datosUsuario = $this->usuarios->where('nombre_usuario', $usuario)->first();

            print_r($datosUsuario);
            if ($datosUsuario != NULL) {
                if (password_verify($password, $datosUsuario['password'])) {
                    $datosSesion = [
                        'id_usuario' => $datosUsuario['id'],
                        'nombre' => $datosUsuario['nombre'],
                        'apellido' => $datosUsuario['apellido'],
                        'nombre_usuario' => $datosUsuario['nombre_usuario'],
                        'correo' => $datosUsuario['nombre']
                    ];

                    $session = session();
                    $session->set($datosSesion);
                    echo view('header');
                    echo view('body');
                    echo view('footer');
                } else {
                    $data['error'] = "La contraseña no es correcta";
                    echo view('login', $data);
                }
            } else {
                $data['error'] = "El usuario no existe";
                echo view('login', $data);
            }
        } else {
            print_r('pasa por aqui');
            $data = ['validation' => $this->validator];
            echo view('login', $data);
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }
}