<?php 
namespace App\Database\Seeds;

class anggota extends \CodeIgniter\Database\Seeder{
    public function run(){
        $data = [
            [ 
                "id"                => "1",   
                "nama_lengkap"      => "sekretaris",
                "jabatan"           => "sekretaris",
                "no_telp"           => "+62 ",
                "alamat"            => "",
                "foto"              => "",
                "log"               =>  "1234,", 
                "tanggal_masuk"     =>  date("Y-m-d H:s:i"), 
            ],  
            [ 
                "id"                => "2",   
                "nama_lengkap"      => "bendahara",
                "jabatan"           => "bendahara",
                "no_telp"           => "+62 ",
                "alamat"            => "",
                "foto"              => "",
                "log"               =>  "1234,", 
                "tanggal_masuk"     =>  date("Y-m-d H:s:i"), 
            ],  
            [ 
                "id"                => "3",   
                "nama_lengkap"      => "ketua dan wakil",
                "jabatan"           => "ketua dan wakil",
                "no_telp"           => "+62 ",
                "alamat"            => "",
                "foto"              => "",
                "log"               =>  "1234,", 
                "tanggal_masuk"     =>  date("Y-m-d H:s:i"), 
            ],  
            [ 
                "id"                => "4",   
                "nama_lengkap"      => "user",
                "jabatan"           => "user",
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