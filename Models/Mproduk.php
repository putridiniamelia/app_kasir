<?php

namespace App\Models;

use CodeIgniter\Model;

class Mproduk extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'kode_produk';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_produk','nama_produk','harga_beli','harga_jual','id_kategori','stok','id_satuan'];

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

    public function getAllProduk(){
        $produk = NEW Mproduk;
        $queryProduk=$produk->query("CALL tampil_produk()")->getResult();
        return $queryProduk;
    }

    public function getProduk($kode = null){
        if ($kode == false) {
            return $this->findAll();
        }
        return $this->where(['kode_produk' => $kode])->first();
    }

    public function simpan($data){
        $produk=NEW Mproduk;
        $kode              = $data['kode_produk'];
        $nama_produk       = $data['nama_produk'];
        $harga_beli        = $data['harga_beli'];
        $harga_jual        = $data['harga_jual'];
        $id                = $data['id_kategori'];
        $stok              = $data['stok'];
        $idSatuan          = $data['id_satuan'];
        $produk->query("CALL tambah_produk('".$kode."', '".$nama_produk."', '".$harga_beli."', '".$harga_jual."', '".$id."', '".$stok."','".$idSatuan."')");
    }
    
    public function detailProduk($kode){
        $produk=new Mproduk;
        $queryProduk=$produk->query("CALL detail_produk('".$kode."')")->getResult();
        return $queryProduk;
    }

    public function hapusProduk($kode){
        $produk= NEW Mproduk;
        $produk->query("CALL hapus_produk('".$kode."')");

    }

    public function updateProduk($data){

        if(is_array($data) && isset($data['kode_produk']) 
                        && isset($data['nama_produk'])
                        && isset($data['harga_beli'])
                        && isset($data['harga_jual'])
                        && isset($data['id_kategori'])
                        && isset($data['stok'])
                        && isset($data['id_satuan']))

        $produk=NEW Mproduk;
        $kode             = $data['kode_produk'];
        $nama_produk       = $data['nama_produk'];
        $harga_beli        = $data['harga_beli'];
        $harga_jual        = $data['harga_jual'];
        $id                = $data['id_kategori'];
        $stok              = $data['stok'];
        $idSatuan          = $data['id_satuan'];
        $produk->query("CALL update_produk('$kode')");
    }

    public function getLaporanProduk(){
        $produk = NEW Mproduk;
        $queryProduk=$produk->query("CALL lihat_laporan()")->getResult();
        return $queryProduk;
    }
    
    public function getNamaProduk(){
        $produk = new Mproduk;
        $queryProduk=$produk->query("CALL lihat_produkpenjualan()")->getResult();
        return $queryProduk;
    }
}
