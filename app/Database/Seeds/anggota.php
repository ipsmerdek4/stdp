<?php 
namespace App\Database\Seeds;

class anggota extends \CodeIgniter\Database\Seeder{
    public function run(){
        $data = [
            [ 
                "id"                => "1",   
                "nama_lengkap"      => "Nama Sekretaris",
                "jabatan"           => "1",
                "no_telp"           => "+62 ",
                "alamat"            => "",
                "foto"              => "",
                "log"               =>  "1234,", 
                "tanggal_masuk"     =>  date("Y-m-d H:s:i"), 
            ],  
            [ 
                "id"                => "2",   
                "nama_lengkap"      => "Nama Bendahara",
                "jabatan"           => "2",
                "no_telp"           => "+62 ",
                "alamat"            => "",
                "foto"              => "",
                "log"               =>  "1234,", 
                "tanggal_masuk"     =>  date("Y-m-d H:s:i"), 
            ],  
            [ 
                "id"                => "3",   
                "nama_lengkap"      => "nama Ketua atau Wakil",
                "jabatan"           => "3",
                "no_telp"           => "+62 ",
                "alamat"            => "",
                "foto"              => "",
                "log"               =>  "1234,", 
                "tanggal_masuk"     =>  date("Y-m-d H:s:i"), 
            ],  
            [ 
                "id"                => "4",   
                "nama_lengkap"      => "Nama user",
                "jabatan"           => "4",
                "no_telp"           => "+62 ",
                "alamat"            => "",
                "foto"              => "",
                "log"               =>  "1234,", 
                "tanggal_masuk"     =>  date("Y-m-d H:s:i"), 
            ],  
        ];

        $this->db->table('tbl_anggota')->insertBatch($data);
    }
}