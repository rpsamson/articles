<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIndexCreatedAtToUsers extends Migration
{
    public function up()
    {
        $this->forge->addKey('created_at');
        $this->forge->processIndexes('users');
    }

    public function down()
    {
        $this->forge->dropKey('users'. 'created_at');
    }
}
