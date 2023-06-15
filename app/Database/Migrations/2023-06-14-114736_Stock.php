<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stock extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
            ],
            'id_barang' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'Pemasok' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->createTable('Stock');
    }

    public function down()
    {
        $this->forge->dropTable('Stock');
    }
}
