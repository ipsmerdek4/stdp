<?php 
namespace App\Database\Seeds;

class users extends \CodeIgniter\Database\Seeder{
    public function run(){
        $data = [
            [ 
                "id"            => "1",   
                "anggota_id"    => "1",
                "email"         => "sekretaris@administrator.com",
                "username"      => "sekretaris",
                "password_hash" =>  \Myth\Auth\Password::hash("1234"),
                "active"        => "1",
                "created_at"    =>  date("Y-m-d H:s:i"), 
            ], 
            [ 
                "id"            => "2",   
                "anggota_id"    => "2",
                "email"         => "bendahara@administrator.com",
                "username"      => "bendahara",
                "password_hash" =>  \Myth\Auth\Password::hash("1234"),
                "active"        => "1",
                "created_at"    =>  date("Y-m-d H:s:i"), 
            ], 
            [ 
                "id"            => "3",   
                "anggota_id"    => "3",
                "email"         => "ketuadanwakil@administrator.com",
                "username"      => "ketuadanwakil",
                "password_hash" =>  \Myth\Auth\Password::hash("1234"),
                "active"        => "1",
                "created_at"    =>  date("Y-m-d H:s:i"), 
            ], 
            [ 
                "id"            => "4",   
                "anggota_id"    => "4",
                "email"         => "user@administrator.com",
                "username"      => "user",
                "password_hash" =>  \Myth\Auth\Password::hash("1234"),
                "active"        => "1",
                "created_at"    =>  date("Y-m-d H:s:i"), 
            ], 
        ];

        $this->db->table('users')->insertBatch($data);
    }
}