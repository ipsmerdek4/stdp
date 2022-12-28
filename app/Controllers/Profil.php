<?php

namespace App\Controllers;


use App\Models\AnggotaModel;

 
class Profil extends BaseController
{

    public function __construct()
    {
      $this->db = \Config\Database::connect();
      $this->builder = $this->db->table('auth_groups');
      $this->builder2 = $this->db->table('users');
      $this->builder3 = $this->db->table('auth_groups_users');
    }

    public function index()
    {  
        $builder = $this->builder2 
                        ->join('tbl_anggota', 'users.anggota_id = tbl_anggota.id')  
                        ->join('auth_groups', 'tbl_anggota.jabatan = auth_groups.id','left')  
                        ->select('
                        tbl_anggota.nama_lengkap as nama_lengkap,
                        tbl_anggota.foto as foto,
                        tbl_anggota.no_telp as no_telp,
                        tbl_anggota.alamat as alamat,
                        tbl_anggota.tanggal_masuk as tanggal_masuk,
                        auth_groups.name as name_jabatan, 
                        users.email as email, 
                        tbl_anggota.id as anggota_id, 
                        ')
                        ->where('tbl_anggota.id', user_id())
                        ->get()->getResult()[0]; 
 

        $data = [
            
            'build' => $builder,
        ];

        return view('profil/index', $data); 
        
    }

 





}
