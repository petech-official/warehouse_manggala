<?php

namespace App\Models;

use CodeIgniter\Model;

class BPBModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bpb';
    protected $primaryKey       = 'id_bpb';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no_bpb', 'tgl_bpb', 'no_surat_jalan', 'packing_list', 'supir', 'no_mobil', 'no_po', 'id_po_detail', 'quantitas', 'berat'];

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
        return $this->db->table('bpb')
            ->join('po_detail', 'po_detail.id_po_detail = bpb.id_po_detail')
            ->join('po', 'po.id_po = po_detail.id_po')
            ->join('supplier', 'supplier.id_supplier = po.id_supplier')
            ->get()->getResultArray();
    }
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_bpb' => $id])->first();
    }


    public function getPODetail($id, $id_po_detail)
    {
        return $this->db->table('bpb')->where('bpb.no_po', $id)->where('bpb.id_po_detail', $id_po_detail)
            ->join('po', 'po.no_po = bpb.no_po')
            ->join('po_detail', 'po_detail.id_po_detail=bpb.id_po_detail')
            ->join('barang', 'barang.id_barang=po_detail.id_barang')
            ->join('barang_jenis', 'barang_jenis.id_barang_jenis=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id_barang_lot=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id_barang_ukuran=barang.id_ukuran')
            ->join('supplier', 'supplier.id_supplier=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id_barang_keterangan=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id_barang_grade=barang.id_grade')
            ->get()->getResultArray();
    }
    public function getPODetailBarang($id, $id_po_detail)
    {
        return $this->db->table('bpb')->where('bpb.id_bpb', $id)->where('bpb.id_po_detail', $id_po_detail)
            ->join('po_detail', 'po_detail.id_po_detail=bpb.id_po_detail')
            ->join('barang', 'barang.id_barang=po_detail.id_barang')
            ->join('barang_jenis', 'barang_jenis.id_barang_jenis=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id_barang_lot=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id_barang_ukuran=barang.id_ukuran')
            ->join('supplier', 'supplier.id_supplier=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id_barang_keterangan=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id_barang_grade=barang.id_grade')
            ->get()->getResultArray();
    }

    public function getNoBPB()
    {
        return $this->db->table("bpb")->select('no_bpb')->orderBy('no_bpb', 'DESC')->get()->getResultArray();
    }
    public function getBarang($id_barang)
    {
        return $this->db->table('po_detail')->where('id_po', $id_barang)
            ->join('barang', 'barang.id_barang=po_detail.id_barang')
            ->join('barang_jenis', 'barang_jenis.id_barang_jenis=barang.id_jenis')
            ->join('barang_lot', 'barang_lot.id_barang_lot=barang.id_lot')
            ->join('barang_ukuran', 'barang_ukuran.id_barang_ukuran=barang.id_ukuran')
            ->join('supplier', 'supplier.id_supplier=barang.id_supplier')
            ->join('barang_keterangan', 'barang_keterangan.id_barang_keterangan=barang.id_keterangan')
            ->join('barang_grade', 'barang_grade.id_barang_grade=barang.id_grade')
            ->get()->getResultArray();
    }
}
