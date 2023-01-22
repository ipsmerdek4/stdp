<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_iuran extends Migration{
    public function up(){

        $this->forge->addField([
            'id'                     => [ 'type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true ], 
            // 'anggota_id'             => [ 'type' => 'int', 'constraint' => 11, 'unsigned' => true, ],  
            // 'tahun_iuran'            => [ 'type' => 'int', 'constraint' => 6,],  
            // 'bulan_iuran'            => [ 'type' => 'tinyint', 'constraint' => 2,],  
            'nominal_iuran'          => [ 'type' => 'bigint', 'constraint' => 20,],  
            'sts_iuran'              => [ 'type' => 'tinyint', 'constraint' => 2, ],  
            'created_at_iuran'       => [ 'type' => 'datetime', 'null' => true],
            'updated_at_iuran'       => [ 'type' => 'datetime', 'null' => true],  
        ]);
        $this->forge->addKey('id', TRUE);
        // $this->forge->addForeignKey('anggota_id', 'tbl_anggota', 'id', '', 'CASCADE');  
        $this->forge->createTable('tbl_iuran');
    }

    public function down(){
        $this->forge->dropTable('tbl_iuran');
    }
}