<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImgeToArticle extends Migration
{
    public function up()
    {
        $this->forge->addColumn('articles', [
            'image'         => [
                'type'          => 'VARCHAR',
                'constraint'    => 128,
                'AFTER'         => 'user_id'
            ]
            ]);
    }

    public function down()
    {
        $this->forge->dropColumn('articles', 'image');
    }
}
