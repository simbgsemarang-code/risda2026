<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSiteVisitors extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'visitor_hash' => [
                'type'       => 'CHAR',
                'constraint' => 64,
            ],
            'visited_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('visitor_hash');
        $this->forge->addKey('visited_at');
        $this->forge->createTable('site_visitors', true);
    }

    public function down()
    {
        $this->forge->dropTable('site_visitors', true);
    }
}
