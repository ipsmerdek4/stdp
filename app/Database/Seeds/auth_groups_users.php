<?php 
namespace App\Database\Seeds;

class auth_groups_users extends \CodeIgniter\Database\Seeder{
    public function run(){
        $data = [
            [ 
                "group_id" => 1,
                "user_id " => 1, 
            ], 
            [ 
                "group_id" => 2,
                "user_id " => 2, 
            ], 
            [ 
                "group_id" => 3,
                "user_id " => 3, 
            ], 
            [ 
                "group_id" => 4,
                "user_id " => 4, 
            ], 
        ];

        $this->db->table('auth_groups_users')->insertBatch($data);
    }
}