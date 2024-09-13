<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimeStampsToArticles extends Migration
{
    public function up()
    {
        $this->forge->addColumn('articles', [
            'created_at' => [
                'type'          => 'DATETIME',
                'null'          => false,
                'default'       => '2000-01-01 00:00:01'
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
                'null'          => false,
                'default'       => '2000-01-01 00:00:01'
            ],
        ]);

        $this->forge->addKey('created_at');
        $this->forge->processIndexes('articles');
    }

    public function down()
    {
        $this->forge->dropColumn('articles', 'created_at');
        $this->forge->dropColumn('articles', 'updated_at');

        $this->forge->dropKey('articles', 'created_at');



    }
}
