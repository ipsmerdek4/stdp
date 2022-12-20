<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_kegiatan extends Migration{
    public function up(){

        // Uncomment below if want config
        $this->forge->addField([
            'id'                    => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ],
            'nama_kgt'              => [ 'type' => 'TEXT'], 
            'nama_pencetak_kgt'     => [ 'type' => 'VARCHAR', 'constraint' => 254], 
            'tgl_start_kgt'         => [ 'type' => 'DATETIME', 'null' => true  ], 
            'tgl_end_kgt'           => [ 'type' => 'DATETIME', 'null' => true  ], 
            'created_at_kgt'        => ['type' => 'datetime', 'null' => true],
            'updated_at_kgt'        => ['type' => 'datetime', 'null' => true],  
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('tbl_kegiatan');
    }

    public function down(){
        $this->forge->dropTable('tbl_kegiatan');
    }
}