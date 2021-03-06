<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'nama', 'username', 'password'];

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

    public function countUser()
    {
        return $this->table('users')->countAll();
    }

    public function getUser()
    {
        return $this->table('users')->select('id, nama, username, nama_user')->join('role_user', 'users.id_user = role_user.id_user');
    }

    public function getUserWithPassword($id)
    {
        return $this->table('users')->where(['id' => $id])->join('role_user', 'users.id_user = role_user.id_user')->get();
    }

    public function search($keyword)
    {
        return $this->table('users')->select('id, nama, username, nama_user')->join('role_user', 'users.id_user = role_user.id_user')->like('nama', $keyword);
    }
}
