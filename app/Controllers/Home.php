<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('id_usuario')) {
            return redirect()->to('/tienda');
        } else {
            return redirect()->to('/login');
        }
        // return view('welcome_message');
    }
}
