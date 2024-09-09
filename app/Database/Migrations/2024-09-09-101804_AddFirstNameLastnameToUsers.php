<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFirstNameLastnameToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'firstname' => [
                'type'          => 'VARCHAR',
                'constraint'    => 128,
                'null'          => false,
                'AFTER'        => 'username'
            ],

            'lastname' => [
                'type'          => 'VARCHAR',
                'constraint'    => 128 ,
                'null'          => false ,
                'AFTER'         => 'firstname'             
            ]
        ]);

       
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'firstname');
        $this->forge->dropColumn('users', 'lastname');

    }
}
