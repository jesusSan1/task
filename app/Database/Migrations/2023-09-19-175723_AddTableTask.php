<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableTask extends Migration
{
    public function up()
    {
        $field = [
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'null' => false,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($field);
        $this->forge->createTable('tasks');
    }

    public function down()
    {
        $this->forge->dropTable('task');
    }
}
