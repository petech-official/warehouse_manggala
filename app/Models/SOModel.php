<?php

namespace App\Models;

use CodeIgniter\Model;

class SOModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'so';
    protected $primaryKey       = 'id_so';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_so', 'no_so', 'tgl_so', 'id_customer', 'alamat_kirim', 'keterangan', 'status'];

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
        return $this->where(['id_so' => $id])->first();
    }
    public function getSO()
    {
        return $this->db->table('so')
            ->join('customer', 'customer.id_customer=so.id_customer')
            ->get()->getResultArray();
    }
    public function getNoSo()
    {

        return $this->db->table("so")->select('no_so')->orderBy('no_so', 'DESC')->get()->getResultArray();
    }
    public function getAlamat($id_customer)
    {
        return $this->db->table('customer_detail')->where('id_customer', $id_customer)->get()->getResultArray();
    }
}
