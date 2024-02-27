<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpenjualan extends Model
{
    protected $table            = 'penjualan';
    protected $primaryKey       = 'kode_penjualan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_penjualan','no_faktur','tgl_penjualan','total_harga','cash','email'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllPenjualan(){
        $penjualan = NEW Mpenjualan;
        $queryPenjualan=$penjualan->query("CALL tampil_penjualan()")->getResult();

        return $queryPenjualan;
    }

    public function generateNomorFaktur()
    {
        // Mendapatkan tanggal saat ini dalam format Ymd (misalnya 20240220)  
        $tanggalSekarang = date('Ymd');

        //no urut terakhir dari database
        $lastTransaction = $this->orderBy('kode_penjualan', 'DESC')->first();
        // Ambil nomor urut terakhir atau setel ke 0 jika belum ada transaksi sebelumnya
        $lastNumber = ($lastTransaction) ? intval(substr($lastTransaction['no_faktur'], -4)) : 0; // Tetapkan nilai default ke 0 jika tidak ada transaksi sebelumnya

        //incremen nomor urut
        $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        // hasilkan nomor transaksi dengan format
        $nomorFaktur = 'INV-' . $tanggalSekarang . $nextNumber;

        // simpan nomor transaksi dalam sesi
        session()->set('GeneratedTransactionNumber', $nomorFaktur);
    }

    // public function getJumlahTransaksiHariIni()
    // {
    //     // Mendapatkan tanggal saat ini dalam format Y-m-d (misalnya 2024-02-20)
    //     $tanggalSekarang = date('Y-m-d');

    //     // Menghitung jumlah transaksi pada hari ini
    //     $jumlahTransaksiHariIni = $this->where('tgl_penjualan', $tanggalSekarang)->countAllResults();

    //     return $jumlahTransaksiHariIni;
    // }

    public function getTotalHargaById($kodePenjualan)
    {
        $query=$this->select('total_harga')->where('kode_penjualan',$kodePenjualan)->first();
        if($query){
            return $query['total_harga'];
        }else{
            return 0;
        }
    }
}
