<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIDtoArticle extends Migration
{
    public function up()
    {
        $this->forge->addColumn('articles', [
            'user_id' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'null'              => false,
            ]
        ]);

        $sql = "SELECT id FROM users LIMIT 1";
        $result = $this->db->query($sql)->getResult();
        if($result) {
            $sql = "UPDATE articles SET user_id = {$result[0]->id}";
            $this->db->query($sql);
        }

        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE' ,
                                        'fk_user_id_users');
        $this->forge->processIndexes('articles');
    }

    public function down()
    {
        $this->forge->dropForeignKey('articles','fk_user_id_users' );
        $this->forge->dropColumn('articles','user_id' );
    }
}
