<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_presensi extends Migration{
    public function up(){

        // Uncomment below if want config
        // $this->forge->addField([
        // 		'id'          		=> [
        // 				'type'           => 'INT',
        // 				'unsigned'       => TRUE,
        // 				'auto_increment' => TRUE
        // 		],
        // 		'title'       		=> [
        // 				'type'           => 'VARCHAR',
        // 				'constraint'     => '100',
        // 		],
        // ]);
        // $this->forge->addKey('id', TRUE);
        // $this->forge->createTable('tbl_presensi');
    }

    public function down(){
        // $this->forge->dropTable('tbl_presensi');
    }
}