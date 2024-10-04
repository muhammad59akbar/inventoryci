<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdukItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskrip_produk' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'hrg_prdk' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
                'null' => false
            ],
            'stock_prdk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false

            ],
            'img_prdk' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('produk_items');
    }

    public function down()
    {
        $this->forge->dropTable('produk_items');
    }
}
