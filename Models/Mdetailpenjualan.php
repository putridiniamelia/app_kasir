<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdetailpenjualan extends Model
{
    protected $table            = 'detailpenjualan';
    protected $primaryKey       = 'id_detail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_detail','kode_penjualan','kode_produk','harga_jual','qty','total_harga'];

    protected bool $allowEmptyInserts = false;

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


    public function getDetailPenjualan($kodePenjualan)
    {
        return $this->db->table('detailpenjualan')
        ->select('detailpenjualan.*,penjualan.no_faktur, produk.nama_produk')
        ->join('penjualan','penjualan.kode_penjualan=detailpenjualan.kode_penjualan')
        ->join('produk','produk.kode_produk=detailpenjualan.kode_produk')
        ->where('detailpenjualan.kode_penjualan',$kodePenjualan)
        ->get()
        ->getResultArray();
    }

    public function hapusdetail($idNya)
    {
        $detail = new Mdetailpenjualan;
        $detail->query("CALL hapus_detailPenjualan('".$idNya."')");
    }
}
