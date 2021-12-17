<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'barang';
    protected $primaryKey       = 'id_barang';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_jenis', 'id_keterangan', 'keterangan_detail', 'lot', 'id_grade', 'produk', 'dus', 'kg', 'keterangan_dus'];

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
        return $this->where(['id_barang' => $id])->first();
    }
    public function getBarang()
    {
        return $this->db->table('barang')
            ->join('barang_jenis', 'barang_jenis.id=barang.id_jenis')
            ->join('barang_keterangan', 'barang_keterangan.id=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id=barang.id_grade')
            ->join('supplier', 'supplier.id=barang.produk')
            ->get()->getResultArray();
    }
}
