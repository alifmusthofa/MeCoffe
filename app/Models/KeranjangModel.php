<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table      = 'keranjang';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'id_user', 'id_barang', 'jumlah', 'status'];
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getkeranjang($id)
    {
        $query = db_connect()->query("SELECT keranjang.id, keranjang.id_user,keranjang.id_barang,keranjang.jumlah,keranjang.status, produk.nama FROM `keranjang` INNER JOIN produk ON produk.id = keranjang.id_barang WHERE keranjang.id_user = " . $id . " ;");
        return $query->getResultArray(); // return objeks
    }
    public function getjoinkeranjang($id)
    {
        $query = db_connect()->query("SELECT keranjang.id, keranjang.id_user,keranjang.id_barang,keranjang.jumlah,keranjang.status, produk.nama,produk.gambar,produk.ukuran,produk.berat,produk.harga,produk.promo FROM `keranjang` INNER JOIN produk ON produk.id = keranjang.id_barang WHERE keranjang.id_user = " . $id . " AND keranjang.status = 'beli';");
        return $query->getResultArray(); // return objeks
    }
    public function countkeranjang($id)
    {
        $query = db_connect()->query("SELECT id FROM `keranjang`  WHERE keranjang.id_user = " . $id . " AND status = 'beli';");
        return $query->getResultArray(); // return objeks
    }
    public function deletekeranjang($id)
    {
        $query = db_connect()->query("DELETE FROM keranjang WHERE id_user = " . $id . " AND status = 'beli';");
        return $query;
    }
}
