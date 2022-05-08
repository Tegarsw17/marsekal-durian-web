<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class DashboardModel extends Model
{
    protected $db;

    protected $DBGroup          = 'default';
    protected $table            = 'nama_durian';
    protected $primaryKey       = 'id_durian';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    // $this->table('nama_durian')->join('update_durian', 'nama_durian.id_durian = update_durian.id_durian');

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function countAllPohon()
    {
        // $builder = $this->db->table('nama_durian');
        // $query = $builder->countAll();
        // return $query;

        return $this->table('nama_durian')->countAll();
        // return $this->table('nama_durian')->selectCount('nama_durian')->get();
        // return $this->db->table('nama_durian')->get();
    }

    public function getDurianUpdate()
    {
        return $this->table('nama_durian')->join('update_durian', 'nama_durian.id_durian = update_durian.id_durian')->get();
    }

    public function getTanamanSakit()
    {
        $builder = $this
            ->table('nama_durian')
            ->join('update_durian', 'nama_durian.id_durian = update_durian.id_durian')
            ->like('status', 'sakit');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getJenisTanaman()
    {
        return $this->db->query('SELECT COUNT(Jenis) AS jenis FROM (SELECT DISTINCT Jenis FROM (SELECT SUBSTRING(nama_durian, 1, LENGTH(nama_durian)-3) AS Jenis FROM nama_durian)AS Jeniss)AS Jenis');
    }
}
