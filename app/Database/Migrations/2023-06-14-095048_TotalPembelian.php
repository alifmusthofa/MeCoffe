<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TotalPembelian extends Migration
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
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'metodePembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'totalpembelian' => [
                'type' => 'DECIMAL',
                'constraint' => 11,
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
        $this->forge->createTable('TotalPembelian');
    }

    public function down()
    {
        $this->forge->dropTable('TotalPembelian');
    }
}