<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangKeteranganModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'barang_keterangan';
    protected $primaryKey       = 'id_barang_keterangan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['keterangan'];

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
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_barang_keterangan' => $id])->first();
    }
}
