<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Satuan extends BaseController
{
    public function index()
    {
        if(!session()->get('sudahkahLogin')){
            return redirect()->to('index-login');
            exit;
        }
        $data=[
            'listSatuan'=>$this->satuan->findAll()
        ];
        return view('satuan/lihat-satuan', $data);
    }

    public function tambah() 
    {
        $data =[
            'detailSatuan'=>$this->satuan->findAll(),
        ] ;

        session()->setFlashdata('simpan','Data berhasil disimpan');
        return view('satuan/tambah-satuan', $data);
    }

    public function simpanSatuan()
    {
        $data = [
            'nama_satuan' => $this->request->getPost('nama_satuan')
        ];

        $this->satuan->insert($data);

        return redirect()->to(site_url('lihat-satuan'));
    }

    public function edit($id){
        $syarat = [
            'id_satuan' => $id
        ];

        $data =[
            'detailSatuan'=>$this->satuan->where($syarat)->findAll()
        ] ;

        session()->setFlashdata('edit','Data telah diubah');
        return view('satuan/edit-satuan',$data);

    }

    public function updateSatuan()
    {
        $data=[
            'id_satuan'=>$this->request->getVar('id_satuan'),
            'nama_satuan'=>$this->request->getVar('nama_satuan')
        ];

        $this->satuan->update($this->request->getVar('id_satuan'),$data);
        return redirect()->to('lihat-satuan');
    }

    public function hapus($id)
    {
        $this->satuan->hapusSatuan($id);
        session()->setFlashdata('hapus','Data telah dihapus');
        return redirect()->to('/lihat-satuan');
    }
}
