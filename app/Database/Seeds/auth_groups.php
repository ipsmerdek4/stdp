<?php 
namespace App\Database\Seeds;

class Auth_groups extends \CodeIgniter\Database\Seeder{
    public function run(){
        $data = [
            [
            "id" => "1",
            "name" => "sekretaris",
            "description" => " Level Pengguna sekretaris",
            ], 
            [
            "id" => "2",
            "name" => "bendahara",
            "description" => " Level Pengguna bendahara",
            ], 
            [
            "id" => "3",
            "name" => "ketuadanwakil",
            "description" => " Level Pengguna ketua dan wakil ketua ",
            ],  
            [
            "id" => "4",
            "name" => "user",
            "description" => " Level Pengguna User",
            ], 
        ];

        $this->db->table('auth_groups')->insertBatch($data);
    }
}