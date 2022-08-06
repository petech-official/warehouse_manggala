<?php

namespace App\Models;

use CodeIgniter\Model;

class SchedulePengeluaranModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'schedule_pengeluaran';
    protected $primaryKey       = 'id_schedule_pengeluaran';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tgl_pengeluaran', 'id_barang', 'id_customer', 'id_customer_detail', 'id_so', 'berat_pengeluaran', 'status_pengeluaran'];

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
        return $this->where(['id_schedule_pengeluaran' => $id])->first();
    }
    public function getPengeluaran()
    {
        return $this->db->table('schedule_pengeluaran')
            ->join('barang', 'barang.id_barang=schedule_pengeluaran.id_barang')
            ->join('barang_jenis', 'barang_jenis.id_barang_jenis=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id_barang_lot=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id_barang_ukuran=barang.id_ukuran')
            ->join('barang_keterangan', 'barang_keterangan.id_barang_keterangan=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id_barang_grade=barang.id_grade')

            ->join('so', 'so.id_so=schedule_pengeluaran.id_so')

            ->join('customer', 'customer.id_customer=schedule_pengeluaran.id_customer')

            ->join('customer_detail', 'customer_detail.id_customer_detail=schedule_pengeluaran.id_customer_detail')
            ->get()->getResultArray();
    }
    public function getPengeluaranDetail($id)
    {
        return $this->db->table('schedule_pengeluaran')->where('tgl_pengeluaran', $id)
            ->join('barang', 'barang.id_barang=schedule_pengeluaran.id_barang')
            ->join('barang_jenis', 'barang_jenis.id_barang_jenis=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id_barang_lot=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id_barang_ukuran=barang.id_ukuran')
            ->join('barang_keterangan', 'barang_keterangan.id_barang_keterangan=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id_barang_grade=barang.id_grade')

            ->join('so', 'so.id_so=schedule_pengeluaran.id_so')

            ->join('customer', 'customer.id_customer=schedule_pengeluaran.id_customer')

            ->join('customer_detail', 'customer_detail.id_customer_detail=schedule_pengeluaran.id_customer_detail')
            ->get()->getResultArray();
    }
}
