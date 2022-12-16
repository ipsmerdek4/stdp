<?php 
namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\UserModel;



use \Hermawan\DataTables\DataTable;


class Anggota extends BaseController{

    public function __construct()
    {
      $this->db = \Config\Database::connect();
      $this->builder = $this->db->table('auth_groups');
      $this->builder2 = $this->db->table('users');
      $this->builder3 = $this->db->table('auth_groups_users');
    }


    public function index()
    {
 
        return view('anggota/index');
    }

 
      
    public function views_anggota()
    {
        
 
        $builder = $this->builder2
                        ->join('tbl_anggota', 'users.anggota_id = tbl_anggota.id')  
                        ->select('
                            tbl_anggota.nama_lengkap as nama_lengkap,
                            tbl_anggota.jabatan as jabatan,
                            tbl_anggota.no_telp as no_telp,
                            tbl_anggota.alamat as alamat, 
                            users.active as active,
                            users.username as username, 
                            users.email as email, 
                            tbl_anggota.log as log, 
                            tbl_anggota.foto as foto, 
                            tbl_anggota.tanggal_masuk as tanggal_masuk, 
                            users.id as user_id
                        '); 

        return DataTable::of($builder)
                ->addNumbering('no')  
                /*   ->edit('nama_jk', function($row){
                    $v = '<span class="text-dark">'.$row->nama_jk.'</span>';
                    return $v;
                }) 
                ->edit('nama_tk', function($row){
                    $v = '<span class="text-dark">'.$row->nama_tk.'</span>';
                    return $v;
                })      */
                ->add('action', function($row){
                    return    ' 
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="javascript:void(0)" data-id="'. $row->user_id .'" class="btn btn-warning btn-sm pt-1 v-gt" data-toggle="modal"  data-target="#v-gt"  data-backdrop="static" data-keyboard="false" style="width:33px;">
                                <i class="fa-solid fa-ellipsis-vertical fa-sm"></i>
                            </a> 
                            <a href="javascript:void(0)" data-id="'. $row->user_id .'" class="btn btn-success btn-sm pt-1 edituk" data-toggle="modal" data-target="#edituk"  data-backdrop="static" data-keyboard="false" style="width:33px;">
                                <i class="fa-solid fa-pen-to-square fa-sm"></i>
                            </a> 
                            <a data-id="'. '1' .'" href="javascript:void(0)" class="btn btn-danger btn-sm pt-1 deluk" style="width:33px;">
                                <i class="fa-solid fa-trash-xmark fa-sm"></i>
                            </a>
                            </div> ';
                })    
                ->hide('user_id') 
                ->toJson();  

    }   


    public function list_view_anggota()
    {
        $id = $this->request->getVar('id');  
        $v = $this->builder2 
                    ->join('tbl_anggota', 'users.anggota_id = tbl_anggota.id')  
                    ->select('
                        tbl_anggota.nama_lengkap as nama_lengkap,
                        tbl_anggota.jabatan as jabatan,
                        tbl_anggota.no_telp as no_telp,
                        tbl_anggota.alamat as alamat, 
                        users.active as active,
                        users.username as username, 
                        users.email as email, 
                        tbl_anggota.log as log, 
                        tbl_anggota.foto as foto, 
                        tbl_anggota.tanggal_masuk as tanggal_masuk, 
                        users.id as user_id
                    ')
                    ->where('users.id', $id)
                    ->get()->getResult(); 
        $data = [
            'h' => $v[0],
        ];


        echo json_encode($data);

    }



}