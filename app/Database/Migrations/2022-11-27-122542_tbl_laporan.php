<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_laporan extends Migration{
    public function up(){

        $this->forge->addField([
            'id'                    => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ], 
            'anggota_id'            => [ 'type' => 'int', 'constraint' => 11, 'unsigned' => true, ], 
            'judul_lpr'             => [ 'type' => 'varchar', 'constraint' => 245 ], 
            'ket_lpr'               => [ 'type' => 'text' ], 
            'file_lpr'              => [ 'type' => 'text' ], 
            'created_at_lpr'        => [ 'type' => 'datetime', 'null' => true],
            'updated_at_lpr'        => [ 'type' => 'datetime', 'null' => true],  
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('anggota_id', 'tbl_anggota', 'id', '', 'CASCADE');  
        $this->forge->createTable('tbl_laporan');
    }

    public function down(){
        $this->forge->dropTable('tbl_laporan');
    }
}