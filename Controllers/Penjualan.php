<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mpenjualan;
use App\Models\Mproduk;
use App\Models\Mdetailpenjualan;

class Penjualan extends BaseController
{
    protected $detail;

    public function index()
    {
        if(!session()->get('sudahkahLogin')){
            return redirect()->to('index-login');
            exit;
        }
        
        $detail = new Mdetailpenjualan(); // Deklarasi variabel $detail
        $nomorFaktur = $this->penjualan->generateNomorFaktur(); // Memanggil method generateNomorFaktur dari model Mpenjualan
        
        $data =[
            'nomorFaktur' => $nomorFaktur,
            'listProduk'=>$this->produk->getAllProduk(),
            'detailPenjualan' => $detail->getDetailPenjualan(session()->get('kodePenjualan')),
            'totalHarga'=>$this->penjualan->getTotalHargaById(session()->get('kodePenjualan')),
        ];

        // Mendapatkan tanggal saat ini
        $tanggalSekarang = date('Y-m-d');

        // Menampilkan view dengan data nomor faktur dan tanggal
        return view('penjualan/lihat-penjualan',$data);
    }

    public function prosesTambahPenjualan()
{
    $listProduk = $this->produk->getAllProduk(); // Get product names
    $data = ['listProduk' => $listProduk];
    
    if ($this->request->getMethod() === 'post') {
        $itemPrice = $this->request->getPost('harga_jual');
        $quantity = $this->request->getPost('jumlah');
        
        // Hitung total harga
        $totalPrice = $itemPrice * $quantity;

        $dataPenjualan = [
            'nomorFaktur' => $this->penjualan->generateNomorFaktur(),
            'tgl_penjualan' => $this->penjualan->generateTanggal(),
            'waktu' => $this->penjualan->generateWaktu(),
            'total_harga' => $totalPrice,
            'email' => session()->get('email'),
        ];

        var_dump($dataPenjualan); // Jika Anda ingin melihat hasilnya

        // Di sini Anda bisa melakukan apa pun dengan $dataPenjualan, seperti menyimpannya ke database

        // Redirect atau tampilkan view yang sesuai setelah melakukan proses
        // return redirect()->to('/lokasi/penjualan/setelah/berhasil');
    }

    return view('penjualan/lihat-penjualan', $data);
}

        //  $this->penjualan->insert($dataPenjualan);


        //  $dataDetailPenjualan = [
        //      'kode_penjualan' => $this->penjualan->insertID,
        //      'kode_produk' => $this->request->getPost('kode_produk'),
        //      'qty' => $this->request->getPost('qty'),
        //      'total_harga' =>$totalPrice
        //  ];
        // var_dump($dataDetailPenjualan);  
        // $this->detailpenjualan->insert($dataDetailPenjualan);

    

    public function savePenjualan()
    {
        //ambil detail barang yang dijual
        $where=['kode_produk'=>$this->request->getPost('kode_produk')];

        $cekBarang=$this->produk->where($where)->findAll();
        // Periksa apakah ada data barang yang ditemukan
        if (!empty($cekBarang)) {
            // Ambil harga jual dari data barang pertama
            $hargaJual = $cekBarang[0]['harga_jual'];
            
            // Lanjutkan proses penyimpanan penjualan
            // ...
        } else {
            // Handle kasus di mana barang tidak ditemukan
            // Misalnya, kembalikan respons error atau tampilkan pesan kepada pengguna
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        if(session()->get('kodePenjualan')==null){
            //1 nampung data penjualan
            $grandTotal = $hargaJual * $this->request->getPost('jumlah'); // Hitung grand total dari barang pertama kali ditambahkan
            $dataPenjualan=[
                'no_faktur'=>$this->request->getPost('no_faktur'),
                'tgl_penjualan'=>date('Y-m-d H:i:s'),
                'email'=>session()->get('email'),
                'total_harga'=> $grandTotal 
            ];

            // 2 simpan ke tabel penjualan
            $this->penjualan->insert($dataPenjualan);
        }

        // 3 menyiapkan data untuk menyimpan detail
        $this->detail = new Mdetailpenjualan();
        $kodePenjualanBaru = $this->penjualan->insertID();
        $dataDetailPenjualan=[
            'kode_penjualan'=>$kodePenjualanBaru,
            'kode_produk'=>$this->request->getPost('kode_produk'),
            'qty'=>$this->request->getPost('jumlah'),
            'total_harga'=>$hargaJual*$this->request->getPost('jumlah')
        ];

        // 4 simpan ke detail penjualan
        $this->detail->insert($dataDetailPenjualan);

        //5 membuat session penjualan
        if(session()->set('kodePenjualan',$kodePenjualanBaru)){
    }else{
        $kodePenjualanSaatIni = session()->get('kodePenjualan');

            $dataDetailPenjualan = [
                'kode_penjualan' => $kodePenjualanSaatIni,
                'kode_produk' => $this->request->getPost('kode_produk'),
                'qty' => $this->request->getPost('jumlah'),
                'total_harga' =>$hargaJual*$this->request->getPost('jumlah')
        ];
        
        $this->detail->insert($dataDetailPenjualan);

        // Perbarui grand total dalam tabel penjualan dengan menambahkan total harga barang baru
        $grandTotalSebelumnya = $this->penjualan->getTotalHargaById($kodePenjualanSaatIni);
        $grandTotalBaru = $grandTotalSebelumnya + ($hargaJual * $this->request->getPost('jumlah'));
        $this->penjualan->update($kodePenjualanSaatIni, ['total_harga' => $grandTotalBaru]);
    }
    // Mengarahkan pengguna kembali ke halaman transaksi penjualan

        return redirect()->to('lihat-penjualan');
    }
    
    public function savePembayaran()
    {
        $kodePenjualanSelesai = session()->get('kodePenjualan');
        session()->remove('kodePenjualan');
        return redirect()->to('/lihat-penjualan');
    }

    public function hapus($kodeNya){
        $this->detail->hapusDetail($kodeNya);
         session()->setFlashdata('hapus','Data berhasil dihapus');
         return redirect()->to('/lihat-penjualan');
 }
    
}
