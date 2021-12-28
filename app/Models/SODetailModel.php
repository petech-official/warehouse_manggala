<?php

namespace App\Models;

use CodeIgniter\Model;

class SODetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'so_detail';
    protected $primaryKey       = 'id_so_detail';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_so', 'id_barang', 'quantitas', 'berat_total', 'keterangan_so'];

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
        return $this->where('id_so', $id)->findAll();
    }
    public function getDataDetail($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where('id_so_detail', $id)->first();
    }
    public function getSODetail($id)
    {
        return $this->db->table('so_detail')->where('id_so', $id)
            ->join('barang', 'barang.id_barang=so_detail.id_barang')
            ->join('barang_jenis', 'barang_jenis.id=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id=barang.id_ukuran')
            ->join('supplier', 'supplier.id=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id=barang.id_grade')
            ->get()->getResultArray();
    }
    public function getSO($id)
    {
        return $this->db->table('so')->where('id_so', $id)
            ->join('customer', 'customer.id=so.id_customer')
            ->join('customer_detail', 'customer_detail.id=so.alamat_kirim', 'customer_detail.id_customer=so.id_customer',)
            ->get()->getResultArray()[0];
    }
}
