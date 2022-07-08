<?php

namespace App\Models;

use CodeIgniter\Model;

class StockBarangDetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'stock_detail';
    protected $primaryKey       = 'id_stock_detail';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_stock', 'tgl_masuk', 'berat_detail', 'posisi'];

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
    public function getStockBarangDetail($id)
    {
        return $this->db->table('stock_detail')->where('id_stock', $id)
            ->get()->getResultArray();
    }
    public function getDataDetail($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where('id_stock_detail', $id)->first();
    }
}
