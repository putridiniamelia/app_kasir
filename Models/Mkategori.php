<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkategori extends Model
{
    protected $table            = 'kategori';
    protected $primaryKey       = 'id_kategori';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kategori','nama_kategori'];

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

    public function getAllKategori(){
        $kategori= NEW Mkategori;
        $queryKategori=$kategori->query("CALL tampil_kategori()")->getResult();
        return $queryKategori;
    }

    public function getKategori($id = null){
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kategori' => $id])->first();
    }

    public function hapusKategori($id){
        $kategori= NEW Mkategori;
        $kategori->query("CALL hapus_kategori('".$id."')");

    }

    public function detailKategori($id)
    {
        $kategori=NEW Mkategori;
        $queryKategori = $kategori->query("CALL detail_kategori()")->getResult();
        return $queryKategori;
    }

    public function updateKategori($data){

        if(is_array($data) 
                        && isset($data['nama_kategori']))

        $kategori=NEW Mkategori;
        // $id_kategori        = $data['id_kategori'];
        $nama_kategori       = $data['nama_kategori'];
        $kategori->query("CALL update_kategori('$nama_kategori')");
    }

    public function cariKategori($id){
        $kategori= NEW Mkategori;
        $queryKategori=$kategori->query("CALL cari_kategori('".$id."')")->getResult();
        return $queryKategori;
        
    }
}
