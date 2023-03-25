<?php

namespace App\Controllers;

use CodeIgniter\Router\Exceptions\RedirectException;

class Login extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('id_usuario')) {
            echo view('login');
        } else {
            echo view('header');
            echo view('body');
            echo view('footer');
        }
    }
}