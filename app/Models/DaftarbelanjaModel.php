<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarbelanjaModel extends Model
{
    protected $table      = 'daftarpembelian';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'id_user', 'id_barang', 'id_transaksi', 'jumlah', 'harga', 'totalharga', 'status'];
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}