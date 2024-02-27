<?php

namespace App\Models;

use CodeIgniter\Model;

class Msatuan extends Model
{
    protected $table            = 'satuan';
    protected $primaryKey       = 'id_satuan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_satuan','nama_satuan'];

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

    public function hapusSatuan($id){
        $satuan= NEW Msatuan;
        $satuan->query("CALL hapus_satuan('".$id."')");

    }

    public function tambah()
{
    $validation = \Config\Services::validation();
    $validation->setRule(
        'nama_satuan',
        'Nama Satuan',
        'required|is_unique[satuan.nama_satuan]',
        [
            'is_unique' => '{field} sudah digunakan!'
        ]
    );

    $datavalid = [
        'nama_satuan' => $this->request->getPost('nama_satuan')
    ];

    if (!$validation->run($datavalid)) {
        $errors = $validation->getErrors();

        return redirect()->back()->withInput()->with('errors', $errors);
    } else {
        // Jika validasi berhasil, simpan data
        $satuan = new Msatuan(); // Ganti SatuanModel dengan nama model yang sesuai
        $satuanModel->insert($datavalid);
        
        // Redirect atau lakukan tindakan lain yang sesuai
        return redirect()->to('/lihat-satuan');
    }
}


}
