<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Muser;

class User extends BaseController
{

    public function index()
    {
        if(!session()->get('sudahkahLogin')){
            return redirect()->to('index-login');
            exit;
        }
        $data=[
            'listUser'=>$this->user->getAllUser()
        ];
        return view('user/lihat-user', $data);
    }

    public function tambah()
    {
        $data=[
            'detailUser' =>$this->user->getAllUser()
        ];
        return view('user/tambah-user',$data);
    }

    public function simpanUser()
    {
        //data yang akan disimpan ke DB
        $data = [
            'email'=> $this->request->getPost('email'),
            'nama_user'=> $this->request->getPost('nama_user'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level')
        ];

        //proses simpan ke DB
        $this->user->insert($data);
        session()->setFlashdata('simpan','Data berhasil disimpan');
        //session()->setFlashdata('gagal','Data gagal disimpan');

        return redirect()->to(site_url('lihat-user'));
    }

    public function edit($email){
        $syarat = [
            'email' => $email
        ];

        $data =[
            'detailUser'=>$this->user->where($syarat)->findAll()
        ] ;

        session()->setFlashdata('edit','Data telah diubah');
        //session()->setFlashdata('gagal','Data gagal diubah');
        return view('user/edit-user',$data);

    }

    public function updateUser()
    {
        $data=[
            'email'=>$this->request->getVar('email'),
            'nama_user'=>$this->request->getVar('nama_user'),
            'password'=>$this->request->getVar('password'),
            'level'=>$this->request->getVar('level'),
            'status'=>$this->request->getVar('status')
        ];

        $this->user->update($this->request->getVar('email'),$data);
        return redirect()->to('lihat-user');
    }

    public function cariUser(){
        $validasiForm=[
            'email' => 'required'
        ];
        
        if($validasiForm){
            $email=$this->request->getPost('email');
            $data=[
                'hasilCari'=>$cekRecord=$this->user->cariUser($email)
            ];
        }

        return view('cari-user');
    }

    public function hapus($email)
    {
        $this->user->hapusUser($email);
        session()->setFlashdata('hapus','Data telah dihapus');
        //session()->setFlashdata('gagal','Data gagal dihapus');
        return redirect()->to('/lihat-user');
    }

}
