<?php

namespace App\Models;

use CodeIgniter\Model;

class DODetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'do_detail';
    protected $primaryKey       = 'id_do_detail';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_do', 'id_barang', 'box', 'berat_total'];

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
    public function getDO($id)
    {
        return $this->db->table('do')->where('id_do', $id)
            ->join('so', 'so.id_so = do.id_so')
            ->join('customer', 'customer.id = so.id_customer')
            ->join('customer_detail', 'customer_detail.id = so.alamat_kirim')
            ->join('supir', 'supir.id=do.id_supir')
            ->join('kendaraan', 'kendaraan.id=do.id_kendaraan')
            ->get()->getResultArray()[0];
    }
    public function getDODetail($id)
    {
        return $this->db->table('do_detail')->where('do_detail.id_do', $id)
            ->join('barang', 'barang.id_barang=do_detail.id_barang')
            ->join('barang_jenis', 'barang_jenis.id=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id=barang.id_ukuran')
            ->join('supplier', 'supplier.id=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id=barang.id_grade')
            ->join('do', 'do.id_do = do_detail.id_do')
            ->get()->getResultArray();
    }
    public function getBarang($id)
    {
        return $this->db->table('do')->where('id_do', $id)
            ->where('so_detail.status_so', 0)
            ->join('so_detail', 'so_detail.id_so = do.id_so')
            ->join('barang', 'barang.id_barang=so_detail.id_barang')
            ->join('barang_jenis', 'barang_jenis.id=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id=barang.id_ukuran')
            ->join('supplier', 'supplier.id=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id=barang.id_grade')
            ->get()->getResultArray();
    }
}
