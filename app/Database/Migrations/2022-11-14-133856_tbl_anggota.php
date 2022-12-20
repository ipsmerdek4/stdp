<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_anggota extends Migration{
    public function up(){

        $this->forge->addField([
            'id'                    => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
            'nama_lengkap'          => [ 'type' => 'VARCHAR', 'constraint' => 254], 
            'jabatan'               => [ 'type' => 'VARCHAR', 'constraint' => 254], 
            'no_telp'               => [ 'type' => 'VARCHAR', 'constraint' => 254], 
            'alamat'                => [ 'type' => 'TEXT'], 
            'foto'                  => [ 'type' => 'TEXT'],  
            'log'                   => [ 'type' => 'TEXT'], 
            'tanggal_masuk'         => [ 'type' => 'DATETIME', 'null' => true ],  
            'created_at_agt'        => ['type' => 'datetime', 'null' => true],
            'updated_at_agt'        => ['type' => 'datetime', 'null' => true], 
    
        ]);
        $this->forge->addPrimaryKey('id', true);  
        $this->forge->createTable('tbl_anggota');
    }

    public function down(){
        $this->forge->dropTable('tbl_anggota');
    }
}