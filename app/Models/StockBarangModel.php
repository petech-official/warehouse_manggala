<?php

namespace App\Models;

use CodeIgniter\Model;

class StockBarangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'stock_barang';
    protected $primaryKey       = 'id_stock';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_barang', 'box', 'berat_total', 'status_stock', 'keterangan_stock', 'lokasi_stock'];

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
    public function getStockDetail()
    {
        return $this->db->table('stock_barang')
            ->join('barang', 'barang.id_barang=stock_barang.id_barang')
            ->join('barang_jenis', 'barang_jenis.id=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id=barang.id_ukuran')
            ->join('supplier', 'supplier.id=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id=barang.id_grade')
            ->get()->getResultArray();
    }
    public function getDataStockDetail($id)
    {
        return $this->db->table('stock_barang')->where('id_stock', $id)
            ->join('barang', 'barang.id_barang=stock_barang.id_barang')
            ->join('barang_jenis', 'barang_jenis.id=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id=barang.id_ukuran')
            ->join('supplier', 'supplier.id=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id=barang.id_grade')
            ->get()->getResultArray()[0];
    }
    public function getIdStock($id_barang)
    {
        return $this->select('id_stock')->where('id_barang', $id_barang)->first();
    }
    public function getBeratStock($id_barang)
    {
        return $this->select('berat_total')->where('id_barang', $id_barang)->first();
    }
    public function getBoxStock($id_barang)
    {
        return $this->select('box')->where('id_barang', $id_barang)->first();
    }
}
