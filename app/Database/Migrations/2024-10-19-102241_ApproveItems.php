<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ApproveItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_approve' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_produk' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'id_kurir' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
            'nama_pemesan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_pemesanan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'jumlah_pesanan' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false,
            ],
            'total_harga' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
                'null' => false
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Approved', 'Pending'],
                'default' => 'Pending',
            ],
            'approved_by' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
            'ordered_by' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
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
        $this->forge->addKey('id_approve', true);
        $this->forge->addForeignKey('id_produk', 'produk_items', 'id_produk', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('approved_by', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('ordered_by', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_kurir', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('approve_items');
    }

    public function down()
    {
        $this->forge->dropTable('approve_items');
    }
}
