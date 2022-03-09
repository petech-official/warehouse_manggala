<?php

namespace App\Models;

use CodeIgniter\Model;

class DOModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'do';
    protected $primaryKey       = 'id_do';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tgl_do', 'no_do', 'id_so', 'no_po', 'id_kendaraan', 'id_supir', 'catatan'];

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
        return $this->where(['id_do' => $id])->first();
    }
    public function getDO()
    {
        return $this->db->table('do')
            ->join('so', 'so.id_so = do.id_so')
            ->join('customer', 'customer.id = so.id_customer')
            ->join('customer_detail', 'customer_detail.id = so.alamat_kirim')
            ->join('supir', 'supir.id=do.id_supir')
            ->join('kendaraan', 'kendaraan.id=do.id_kendaraan')
            ->get()->getResultArray();
    }
    public function getDOrder()
    {
        return $this->db->table('do')
            ->join('customer', 'customer.id=do.id_customer')
            ->join('customer_detail', 'customer_detail.id=do.alamat_kirim', 'customer_detail.id_customer=so.id_customer',)
            ->get()->getResultArray();
    }
    public function getNoDo()
    {

        return $this->db->table("do")->select('no_do')->orderBy('no_do', 'DESC')->get()->getResultArray();
    }
}
