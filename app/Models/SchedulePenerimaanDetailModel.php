<?php

namespace App\Models;

use CodeIgniter\Model;

class SchedulePenerimaanDetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'schedule_penerimaan_detail';
    protected $primaryKey       = 'id_schedule_penerimaan_detail';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_schedule_penerimaan', 'id_po', 'id_barang', 'id_supplier', 'berat_penerimaan', 'status_penerimaan'];

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

    public function getPenerimaanDetail($id)
    {
        return $this->db->table('schedule_penerimaan_detail')->where('id_schedule_penerimaan', $id)
            ->join('barang', 'barang.id_barang=schedule_penerimaan_detail.id_barang')
            ->join('barang_jenis', 'barang_jenis.id_barang_jenis=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id_barang_lot=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id_barang_ukuran=barang.id_ukuran')
            ->join('barang_keterangan', 'barang_keterangan.id_barang_keterangan=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id_barang_grade=barang.id_grade')
            ->join('supplier', 'supplier.id_supplier=barang.id_supplier')
            ->join('po', 'po.id_po=schedule_penerimaan_detail.id_po')
            ->get()->getResultArray();
    }
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_schedule_penerimaan_detail' => $id])->first();
    }
}
