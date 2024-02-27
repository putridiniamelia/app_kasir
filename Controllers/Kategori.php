<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mkategori;

class Kategori extends BaseController
{
    public function index()
    {
        if(!session()->get('sudahkahLogin')){
            return redirect()->to('index-login');
            exit;
        }
        $data =[
            'listKategori'=>$this->kategori->getAllKategori()
        ] ;

        return view('kategori/lihat-kategori', $data);
    }

    public function tambah()
    {
        $data =[
            'detailKategori'=>$this->kategori->getAllKategori()
        ] ;

        session()->setFlashdata('simpan','Data berhasil disimpan');
        session()->setFlashdata('gagal','Data gagal disimpan');
        
        return view('kategori/tambah-kategori', $data);
    }

    public function simpanKategori()
    {
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ];

        $this->kategori->insert($data);

        return redirect()->to(site_url('lihat-kategori'));
    }

    // public function update($id)
    // {
    //     $this->kategori->updateKategori(
    //         ['nama_kategori' => $this->request->getVar('nama_kategori')]
    //         );
    //     session()->setFlashdata('Pesan','Data berhasil diupdate');
    //     return redirect()->to(site_url('lihat-kategori'));
    // }

    public function hapus($id)
    {
        $this->kategori->hapusKategori($id);
        session()->setFlashdata('hapus','Data telah dihapus');
        session()->setFlashdata('gagal','Data gagal dihapus');
        return redirect()->to('/lihat-kategori');
    }

    public function edit($id){
        $syarat = [
            'id_kategori' => $id
        ];

        $data =[
            'detailKategori'=>$this->kategori->where($syarat)->findAll()
        ] ;

        session()->setFlashdata('edit','Data telah diubah');
        session()->setFlashdata('gagal','Data gagal diubah');
        return view('kategori/edit-kategori',$data);

    }

    public function updateKategori()
    {
        $data=[
            'id_kategori'=>$this->request->getVar('id_kategori'),
            'nama_kategori'=>$this->request->getVar('nama_kategori')
        ];

        $this->kategori->update($this->request->getVar('id_kategori'),$data);
        return redirect()->to('lihat-kategori');
    }
}
