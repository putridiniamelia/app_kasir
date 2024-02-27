<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        return view('login/index-login');
    }

    public function prosesLogin()
    {
        $validasiForm=[
            'email' => 'required',
            'password' => 'required'
        ];

        if ($this->validate($validasiForm)){
            $email = $this->request->getPost('email');
            $password = md5($this->request->getPost('password'));
            $whereLogin = [
                'email' => $email,
                'password' => $password
            ];
            // Select * from tbl_user where email='$email' and password='$password'
            $cekLogin = $this->user->where($whereLogin)->findAll();
            if (count($cekLogin) == 1) {
                // Jika ditemukan data
                // 1. Buat session email, nama, level
                $dataSession = [
                    'email' => $cekLogin[0]['email'],
                    'nama_user' => $cekLogin[0]['nama_user'],
                    'password' => $cekLogin[0]['password'],
                    'level' => $cekLogin[0]['level'],
                    'sudahkahLogin' => true
                ];
                
                session()->set($dataSession);
            
                // Redirect ke dashboard setelah login
                return redirect()->to('/dashboard');
            } else {
                // Jika tidak ditemukan apapun
                return redirect()->to('/index-login')->with('pesan', '<p class="text-danger text-center">
                Gagal Login! <br> Periksa Email atau Password!</p>');
            }
        }
        return view('login/index-login');
    }
    
    public function signup()
    {
        // Definisikan $data dengan nilai default
        $data = [];

        $validasiForm=[
        'email'=>'required',
        'password' => 'required',
        ];

        // jika tombol simpan ditekan
        if($this->validate($validasiForm)){
            $data=[
                'email' =>$this->request->getPost('email'),
                'nama_user' =>$this->request->getPost('nama_user'),
                'password' =>$this->request->getPost('password'),
                'role' =>$this->request->getPost('role')
            ];

            $cekRecord=$this->user->cariUser($data['email']);
            if(isset($cekRecord[0]->email)){
                $this->user->updateUser($data);
            } else {
                $this->user->tambahUser($data);

                // Log in the user after registration
                $this->loginAfterRegistration($data['email'], $data['password']);
                session()->setFlashdata('pesan','Data berhasil ditambahkan');
            }
            return redirect()->to('/dashboard');
        }

        return view('login/signup', $data);
    }

     // Helper function to log in the user after registration
private function loginAfterRegistration($email, $password)
{
    $whereLogin = [
        'email' => $email,
        'password' => md5($password)
    ];

    // Select * from tbl_user where email='$email' and password='$password'
    $cekLogin = $this->user->where($whereLogin)->findAll();
    
    if (count($cekLogin) == 1) {
        // Check if the user is active
        if ($cekLogin[0]['status'] == 'aktif') {
            // Create session data
            $dataSession = [
                'email' => $cekLogin[0]['email'],
                'password' => $cekLogin[0]['password'],
                'role' => $cekLogin[0]['role'],
                'nama_user' => $cekLogin[0]['nama_user'],
                'sudahkahLogin' => true
            ];

            // Set session data
            session()->set($dataSession);
        }
       }
    }  

    public function logout()
    {
        // Hapus semua data sesi
        session()->destroy();
        
        // Lakukan proses logout
        // Misalnya, hapus informasi sesi
        return redirect()->to('/');
    }
}
