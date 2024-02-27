<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        if(!session()->get('sudahkahLogin')){
            return redirect()->to('index-login');
            exit;
        }
        echo view('dashboard');
    }
}
?>