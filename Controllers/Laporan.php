<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mproduk;

class Laporan extends BaseController
{
    public function index()
    {
        if(!session()->get('sudahkahLogin')){
            return redirect()->to('index-login');
            exit;
        }
        return view('laporan/lihat-laporan');
    }

    public function tampilLaporan()
    {
        $produk = NEW Mproduk;
        $data =[
            'listProduk'=>$this->produk->getLaporanProduk()
        ];

        // $listProduk = $this->produk->getLaporanProduk();

        return view('laporan/lihat-laporan', $data);
    }
}
