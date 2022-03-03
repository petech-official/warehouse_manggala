<?php

namespace App\Models;

use CodeIgniter\Model;

class PODetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'po_detail';
    protected $primaryKey       = 'id_po_detail';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_po', 'id_barang', 'quantitas', 'quantitas_mutasi', 'berat_total', 'berat_total_mutasi', 'keterangan_po_detail', 'status_po'];

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
        return $this->where('id_po', $id)->findAll();
    }
    public function getDataDetail($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where('id_po_detail', $id)->first();
    }
    public function getPODetail($id)
    {
        return $this->db->table('po_detail')->where('id_po', $id)
            ->join('barang', 'barang.id_barang=po_detail.id_barang')
            ->join('barang_jenis', 'barang_jenis.id=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id=barang.id_ukuran')
            ->join('supplier', 'supplier.id=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id=barang.id_grade')
            ->get()->getResultArray();
    }

    public function getPODetailBerjalan($id)
    {
        return $this->db->table('po_detail')->where('id_po', $id)->where('status_po', 0)
            ->join('barang', 'barang.id_barang=po_detail.id_barang')
            ->join('barang_jenis', 'barang_jenis.id=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id=barang.id_ukuran')
            ->join('supplier', 'supplier.id=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id=barang.id_grade')
            ->get()->getResultArray();
    }
    public function getPO($id)
    {
        return $this->db->table('po')->where('id_po', $id)
            ->join('supplier', 'supplier.id=po.id_supplier')
            ->get()->getResultArray()[0];
    }
    public function getIdPO($id)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->select('id_po')->where('id_po_detail', $id)->first();
    }

    public function getPoDetailBarang($id_po, $id_barang, $status_po)
    {

        return $this->where('id_po', $id_po)->where('id_po_detail', $id_barang)->where('status_po', $status_po)->first();
    }
    public function getStatus($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->select('status_po')->where('id_po', $id)->groupBy('status_po')->findAll();
        // return $this->select('status_po')->where('id_po', $id)->findAll();
    }
}
