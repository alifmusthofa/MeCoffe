<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {

        //cek apakah ada session bernama isLogin
        if ($this->session->get('isLogin') != true) {
            return redirect()->to('/auth/login');
        }

        //cek role dari session
        if ($this->session->get('role') != 2) {
            return redirect()->to('/auth/login');
        }

        return view('user/index');
    }
}
