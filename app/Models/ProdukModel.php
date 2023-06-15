<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'nama', 'slug', 'deskripsi', 'ukuran', 'berat', 'stok', 'harga', 'gambar', 'promo', 'status'];
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function last()
    {
        $query = db_connect()->query("select id from produk ORDER BY id DESC LIMIT 1");
        return $query->getFirstRow(); // return objek


    }
}
