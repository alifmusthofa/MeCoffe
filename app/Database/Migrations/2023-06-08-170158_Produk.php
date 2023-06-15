<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ukuran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'berat' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'harga' => [
                'type' => 'DECIMAL',
                'constraint' => 11,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'promo' => [
                'type' => 'DECIMAL',
                'constraint' => 11,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
