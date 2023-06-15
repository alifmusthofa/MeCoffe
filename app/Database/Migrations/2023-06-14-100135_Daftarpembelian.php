<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Daftarpembelian extends Migration
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
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'id_barang' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'harga' => [
                'type' => 'DECIMAL',
                'constraint' => 11,
            ],
            'totalharga' => [
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
        $this->forge->createTable('Daftarpembelian');
    }

    public function down()
    {
        $this->forge->dropTable('Daftarpembelian');
    }
}
