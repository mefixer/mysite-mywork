<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Mensajes extends BaseController
{
    public function index($activo = 1)
    {
        $session = session();
        if (!$session->get('id_usuario')) {
            echo view('login');
        } else {


        }
    }
}
