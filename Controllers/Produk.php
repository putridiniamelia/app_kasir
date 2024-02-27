<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mproduk ;
use App\Models\Mkategori;
use App\Models\Msatuan;

class Produk extends BaseController
{
    public function index()
    {
        if(!session()->get('sudahkahLogin')){
            return redirect()->to('index-login');
            exit;
        }
        $data=[
            'listProduk'=>$this->produk->getAllProduk()
        ];
        return view('produk/lihat-produk', $data);
    }

    public function tambah()
    {
    // Ambil data kategori dan satuan
    $data = [
        'listKategori' => $this->kategori->getAllKategori(),
        'listSatuan' => $this->satuan->findAll()
    ];

    if ($this->request->getMethod() === 'post') {
        // Validasi input
        $validationRules = [
            'nama_produk' => 'required|is_unique[produk.nama_produk]',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric|greater_than[harga_beli]'
        ];
    
        // Pesan kesalahan khusus untuk setiap aturan validasi
        $validationMessages = [
            'nama_produk' => [
                'is_unique' => 'Nama produk sudah ada.'
            ],
            'harga_jual' => [
                'greater_than' => 'Harga jual harus lebih besar dari harga beli.'
            ]
        ];
    
        // Lakukan validasi
        if (!$this->validate($validationRules, $validationMessages)) {
            $data['validation'] = $this->validator;
            // Jika validasi gagal, kembalikan ke halaman tambah dengan pesan error
            return view('produk/tambah-produk', $data);
        }
    
        // Jika validasi berhasil, lakukan penambahan produk ke database
        // ...
    }
    

    session()->setFlashdata('simpan','Data berhasil disimpan');
    //session()->setFlashdata('gagal','Data gagal diubah');
    // Tampilkan halaman tambah produk
    return view('produk/tambah-produk', $data);
    }

    public function simpanProduk()
    {
        $data = [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga_beli' =>str_replace('.','', $this->request->getPost('harga_beli')),
            'harga_jual' =>str_replace('.','', $this->request->getPost('harga_jual')),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'stok' =>str_replace('.','', $this->request->getPost('stok')),
            'id_satuan' => $this->request->getPost('id_satuan')
        ];

        $this->produk->simpan($data);
        return redirect()->to(site_url('lihat-produk'));
    }

    public function edit($kode){
        $syarat = [
            'kode_produk' => $kode
        ];

        $data =[
            'detailProduk'=>$this->produk->where($syarat)->findAll(),
            'listKategori'=>$this->kategori->getAllKategori(),
            'listSatuan'=>$this->satuan->findAll()
        ] ;

        session()->setFlashdata('edit','Data telah diubah');
        //session()->setFlashdata('gagal','Data gagal diubah');
        return view('produk/edit-produk',$data);

    }

    public function updateProduk()
    {
        $data=[
            'kode_produk'=>$this->request->getVar('kode_produk'),
            'nama_produk'=>$this->request->getVar('nama_produk'),
            'harga_beli'=>str_replace('.','',$this->request->getVar('harga_beli')),
            'harga_jual'=>str_replace('.','', $this->request->getVar('harga_jual')),
            'id_kategori'=>$this->request->getVar('id_kategori'),
            'stok'=>str_replace('.','', $this->request->getVar('stok')),
            'id_satuan'=>$this->request->getVar('id_satuan'),
        ];

        $this->produk->update($this->request->getVar('kode_produk'),$data);
        return redirect()->to('lihat-produk');
    }

    public function hapus($kode)
    {
        $this->produk->hapusProduk($kode);
        session()->setFlashdata('hapus','Data telah dihapus');
        //session()->setFlashdata('gagal','Data gagal dihapus');
        return redirect()->to('/lihat-produk');
    }
}
