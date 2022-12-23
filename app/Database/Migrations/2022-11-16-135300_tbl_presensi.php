<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_presensi extends Migration{
    public function up(){

        $this->forge->addField([
            'id'                    => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ], 
            'anggota_id'            => [ 'type' => 'int', 'constraint' => 11, 'unsigned' => true, ], 
            'kegiatan_id'           => [ 'type' => 'int', 'constraint' => 11, 'unsigned' => true, ], 
            'created_at_prsn'       => [ 'type' => 'datetime', 'null' => true],
            'updated_at_prsn'       => [ 'type' => 'datetime', 'null' => true],  
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('kegiatan_id', 'tbl_kegiatan', 'id', '', 'CASCADE');  
        $this->forge->addForeignKey('anggota_id', 'tbl_anggota', 'id', '', 'CASCADE');  
        $this->forge->createTable('tbl_presensi');
    }

    public function down(){
        $this->forge->dropTable('tbl_presensi');
    }
}