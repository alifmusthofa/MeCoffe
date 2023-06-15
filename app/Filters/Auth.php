<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //cek apakah ada session bernama isLogin
        // if (!session()->get('isLogin')) {
        //     return redirect()->to('/auth/login');
        // }

        if (!session()->has('isLogin')) {
            return redirect()->to('/auth/register');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
