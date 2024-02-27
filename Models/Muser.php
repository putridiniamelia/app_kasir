<?php

namespace App\Models;

use CodeIgniter\Model;

class Muser extends Model
{

    protected $table            = 'user';
    protected $primaryKey       = 'email';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['email','nama_user','password','level','status'];

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

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getAllUser(){
        $user= NEW MUser;
        $queryUser=$user->query("CALL tampil_user()")->getResult();
        return $queryUser;
    }

    public function getUser($email = null){
        if ($email == false) {
            return $this->findAll();
        }
        return $this->where(['email' => $email])->first();
    }

    // public function simpanUser($data){ 
    //     $user=NEW MUser;
    //     $email        = $data['email'];
    //     $nama_user    = $data['nama_user'];
    //     $password     = $data['password'];
    //     $level        = $data['level'];
    //     $status       = $data['status'];
    //     $user->query("CALL tambah_user('$email','$nama_user','$password','$level','$status')");

    // }

    public function cariUser($email)
    {
        $user = new Muser;
        $queryUser = $user->query("CALL cari_user(".$email.")")->getResult();
        return $queryUser;
    }

    public function hapusUser($email){
        $user= NEW Muser;
        $user->query("CALL hapus_user('".$email."')");

    }

    public function updateUser($data){

        if(is_array($data) && isset($data['email']) 
                        && isset($data['nama_user'])
                        && isset($data['password'])
                        && isset($data['level'])
                        && isset($data['status']))

        $user=NEW Muser;
        $email        = $data['email'];
        $nama_user    = $data['nama_user'];
        $passsword    = $data['password'];
        $level        = $data['level'];
        $status        = $data['status'];
        $user->query("CALL update_user('$email')");
    }
}

