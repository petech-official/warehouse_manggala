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
    protected $allowedFields    = ['id_do', 'id_barang', 'box', 'do_berat_total'];

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
        return $this->where(['id_do_detail' => $id])->first();
    }
    public function getDO($id)
    {
        return $this->db->table('do')->where('id_do', $id)
            ->join('so', 'so.id_so = do.id_so')
            ->join('customer', 'customer.id_customer = so.id_customer')

            ->join('supir', 'supir.id_supir=do.id_supir')
            ->join('kendaraan', 'kendaraan.id_kendaraan=do.id_kendaraan')
            ->get()->getResultArray()[0];
    }
    public function getDODetail($id)
    {
        return $this->db->table('do_detail')->where('do_detail.id_do', $id)

            ->join('barang', 'barang.id_barang=do_detail.id_barang')
            ->join('barang_jenis', 'barang_jenis.id_barang_jenis=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id_barang_lot=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id_barang_ukuran=barang.id_ukuran')
            // ->join('supplier', 'supplier.id_supplier=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id_barang_keterangan=barang.id_keterangan')

            ->join('barang_grade', 'barang_grade.id_barang_grade=barang.id_grade')
            ->join('do', 'do.id_do = do_detail.id_do')
            ->join('so', 'so.id_so = do.id_so')
            ->join('so_detail', '(so_detail.id_so = so.id_so and so_detail.id_barang=do_detail.id_barang)')

            ->join('customer_detail', 'customer_detail.id_customer_detail = so_detail.keterangan_so')
            ->select('* , barang_keterangan.keterangan as barang_keterangan')

            ->get()->getResultArray();
    }
    public function getBarang($id)
    {
        return $this->db->table('do')->where('id_do', $id)
            ->where('so_detail.status_so', 0)
            ->join('so_detail', 'so_detail.id_so = do.id_so')
            ->join('barang', 'barang.id_barang=so_detail.id_barang')
            ->join('barang_jenis', 'barang_jenis.id_barang_jenis=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id_barang_lot=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id_barang_ukuran=barang.id_ukuran')
            ->join('supplier', 'supplier.id_supplier=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id_barang_keterangan=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id_barang_grade=barang.id_grade')
            ->get()->getResultArray();
    }
}
