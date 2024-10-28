<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ResPengiriman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengiriman' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_resi' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
                'unique'         => true
            ],
            'id_approve' => [
                'type' => 'INT',
                'unsigned'       => true,

            ],
            'nama_penerima' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'foto_penerima' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Delivery', 'Delivered Successfully'],
                'default' => 'Delivery',
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
        $this->forge->addKey('id_pengiriman', true);
        $this->forge->addForeignKey('id_approve', 'approve_items', 'id_approve', 'CASCADE', 'CASCADE');
        $this->forge->createTable('resPengiriman');
    }

    public function down()
    {
        $this->forge->dropTable('resPengiriman');
    }
}
