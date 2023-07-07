<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'id_user', 'metodePembayaran', 'totalpembelian'];
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function last($id_user)
    {
        $query = db_connect()->query("select id from transaksi where id_user = '" . $id_user . "' ORDER BY id DESC LIMIT 1;");
        return $query->getFirstRow(); // return objek
    }
    public function jointransaksi($id_user)
    {
        $query = db_connect()->query("SELECT daftarpembelian.id,daftarpembelian.id_user,daftarpembelian.id_barang,daftarpembelian.id_transaksi,jumlah,daftarpembelian.harga,totalharga,daftarpembelian.status,daftarpembelian.created_at,metodePembayaran,totalpembelian,nama FROM `daftarpembelian` INNER JOIN transaksi ON daftarpembelian.id_transaksi = transaksi.id INNER JOIN produk ON produk.id = daftarpembelian.id_barang WHERE daftarpembelian.id_user = " . $id_user . " ORDER BY daftarpembelian.created_at DESC;");
        return $query->getResultArray();
    }
    public function countTransaksi()
    {
        $query = db_connect()->query("SELECT COUNT(DISTINCT daftarpembelian.id_transaksi) AS hitung FROM `daftarpembelian` INNER JOIN transaksi ON daftarpembelian.id_transaksi = transaksi.id WHERE daftarpembelian.id_user = 4;");
        return $query->getFirstRow(); // return objek
    }
}
