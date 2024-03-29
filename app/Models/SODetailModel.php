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
    protected $allowedFields    = ['id_so_detail', 'id_so', 'id_barang', 'quantitas', 'quantitas_mutasi', 'berat_total', 'berat_total_mutasi', 'keterangan_so', 'status_so', 'tgl_kirim'];

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
            ->join('barang_jenis', 'barang_jenis.id_barang_jenis=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id_barang_lot=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id_barang_ukuran=barang.id_ukuran')
            ->join('supplier', 'supplier.id_supplier=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id_barang_keterangan=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id_barang_grade=barang.id_grade')
            ->join('customer_detail', 'customer_detail.id_customer_detail=so_detail.keterangan_so')
            ->get()->getResultArray();
    }
    public function getSO($id)
    {
        return $this->db->table('so')->where('id_so', $id)
            ->join('customer', 'customer.id_customer=so.id_customer')
            ->join('customer_detail', 'customer_detail.id_customer=so.id_customer',)
            ->get()->getResultArray()[0];
    }
    public function getIdSo($id)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->select('id_so')->where('id_so_detail', $id)->first();
    }
    public function getSoDetailBarang($id_so, $id_barang, $status_so)
    {

        return $this->where('id_so', $id_so)->where('id_barang', $id_barang)->where('status_so', $status_so)->first();
    }
    public function getStatus($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->select('status_so')->where('id_so', $id)->groupBy('status_so')->findAll();
    }
}
