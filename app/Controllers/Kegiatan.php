<?php 
namespace App\Controllers;
 
use App\Models\KegiatanModel;
 
use \Hermawan\DataTables\DataTable;


class Kegiatan extends BaseController{

    public function __construct()
    {
      $this->db = \Config\Database::connect();
      $this->builder = $this->db->table('auth_groups');
      $this->builder2 = $this->db->table('users');
      $this->builder3 = $this->db->table('auth_groups_users');
    }


    public function index()
    { 
        return view('kegiatan/index');
    }


    public function views_kegiatan()
    {
        $Kegiatan = new KegiatanModel(); 
        $builder = $Kegiatan; 

            return DataTable::of($builder)
                ->addNumbering('no')  
                 /*  ->edit('active', function($row){
                    if ($row->active == 1) {
                        $v = '<span class="badge badge-success">Active</span>';
                    } else {
                        $v = '<span class="badge badge-danger">No Active</span>'; 
                    }
                    return $v;
                })   */
                ->add('action', function($row){
                    return    ' 
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="javascript:void(0)" data-id="'. $row->user_id .'" class="btn btn-warning btn-sm pt-1 v-gt" data-toggle="modal"  data-target="#v-gt"  data-backdrop="static" data-keyboard="false" style="width:33px;">
                                <i class="fa-solid fa-ellipsis-vertical fa-sm"></i>
                            </a> 
                            <a href="javascript:void(0)" data-id="'. $row->user_id .'" class="btn btn-success btn-sm pt-1 e-gt" style="width:33px;">
                                <i class="fa-solid fa-pen-to-square fa-sm"></i>
                            </a> 
                            <a data-id="'. $row->user_id .'" href="javascript:void(0)" class="btn btn-danger btn-sm pt-1 d-gt" style="width:33px;">
                                <i class="fa-solid fa-trash-xmark fa-sm"></i>
                            </a>
                            </div> ';
                })    
                ->hide('user_id') 
                ->toJson();  

    }   

    public function create()
    { 
        
        session();
        $data = [   
            'validation' 		=> \Config\Services::validation(), 
        ];

        return view('kegiatan/create', compact('data')); 

    }







}