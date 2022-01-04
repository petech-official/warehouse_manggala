<?php

namespace App\Models;

use CodeIgniter\Model;

class POModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'po';
    protected $primaryKey       = 'id_po';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no_po', 'tgl_po', 'id_supplier', 'keterangan_po'];

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

    public function getPO()
    {
        return $this->db->table('po')
            ->join('supplier', 'supplier.id=po.id_supplier')
            ->get()->getResultArray();
    }
    public function getNoPo()
    {

        return $this->db->table("po")->select('no_po')->orderBy('no_po', 'DESC')->get()->getResultArray();
    }
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_po' => $id])->first();
    }
}
