<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableArticles extends Migration
{
    public function up()
    {
        $fields = [

            // id ---
            'id' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true
            ],

            // title ---
            'title' => [
                'type'              => 'VARCHAR',
                'constraint'        => 128,
                'null'              => false,
            ],
            // content ---
            'content' => [
                'type'              => 'TEXT',
                'null'              => false,
            ],

        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('articles');

    }

    public function down()
    {
        $this->forge->dropTable('articles');
    }
}
