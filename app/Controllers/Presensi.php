<?php 
namespace App\Controllers;

use App\Models\PresensiModel;
use \Hermawan\DataTables\DataTable;
use App\Models\KegiatanModel;


class Presensi extends BaseController{


    public function __construct()
    {
      $this->db = \Config\Database::connect();
      $this->builder = $this->db->table('auth_groups');
      $this->builder2 = $this->db->table('users');
      $this->builder3 = $this->db->table('auth_groups_users');
    }

    public function index()
    {
        $Kegiatan = new KegiatanModel();


        session();
        $data = [   
            'kegiatan'          => $Kegiatan->findAll(),
            'validation' 		=> \Config\Services::validation(), 
        ];

        return view('presensi/index', compact('data')); 
    }

    public function pogress()
    {
        
        if (!$this->validate([  
            'kegiatan'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Kegiatan Harus di Pilih.', 	 
                    ]
            ],  
        ])) {
            $validation = \Config\Services::validation();  
            return redirect()->to('/presensi')->withInput();
        }
        
        $kegiatan = $this->request->getVar('kegiatan'); 
        $waktu = date("Y-m-d H:i:s"); 

        $data1 = [ 
            'anggota_id'            => user_id(),
            'kegiatan_id'           => $kegiatan,
            'created_at_prsn'       => $waktu, 
            'updated_at_prsn'       => null 
        ];

        $Presensi = new PresensiModel();
        $Presensi->insert($data1);  

        session()->setFlashdata('msg_sccs', 'Berhasil melakukan presensi.');
        return redirect()->to(base_url('presensi'))->withInput();   






    }

    public function view()
    {
        $Kegiatan = new KegiatanModel();


        session();
        $data = [   
            'kegiatan'          => $Kegiatan->findAll(),
            'validation' 		=> \Config\Services::validation(), 
        ];
        return view('presensi/view', compact('data')); 
    }

    
    public function views_()
    {
        $Presensi = new PresensiModel(); 
        $builder = $Presensi
            ->join('tbl_anggota', 'tbl_presensi.anggota_id = tbl_anggota.id')
            ->join('tbl_kegiatan', 'tbl_presensi.kegiatan_id = tbl_kegiatan.id')
            ->select('
                    tbl_anggota.nama_lengkap as nama_lengkap,  
                    tbl_kegiatan.nama_kgt as nama_kgt, 
                    tbl_presensi.created_at_prsn as waktu_presensi,
                    tbl_kegiatan.keterangan_kgt as keterangan_kgt,
                    tbl_presensi.id as presensi_id 
                    '); 

            return DataTable::of($builder)
                ->addNumbering('no')  
                 ->edit('keterangan_kgt', function($row){
                    $v  =  '<a href="javascript:void(0)" data-id="'. $row->keterangan_kgt .'" class="btn btn-warning btn-sm pt-1 v-ket-kgt" data-toggle="modal"  data-target="#v-ket-kgt"  data-backdrop="static" data-keyboard="false" style="width:33px;">
                                <i class="fa-solid fa-up-right-from-square fa-sw"></i>
                            </a>'; 
                    return $v ;
                })  
                ->edit('waktu_presensi', function($row){
                    $vv = explode(' ', $row->waktu_presensi);
                    $vvv = explode('-', $vv[0]);
                    $v = '  <p class="font-weight-bold mx-auto mb-0" style="width:95px">'.$vvv[2].'-'.$vvv[1].'-'.$vvv[0].'<br>'.$vv[1].'</p>';
                    return $v ;
                })   
                ->add('action', function($row){
                   return    ' 
                            <div class="btn-group" role="group" aria-label="Basic example"> 
                            <a href="javascript:void(0)" data-id="'. $row->presensi_id .'" class="btn btn-success btn-sm pt-1 e-kgt" style="width:33px;">
                                <i class="fa-solid fa-pen-to-square fa-sm"></i>
                            </a> 
                            <a data-id="'. $row->presensi_id .'" href="javascript:void(0)" class="btn btn-danger btn-sm pt-1 d-kgt" style="width:33px;">
                                <i class="fa-solid fa-trash-xmark fa-sm"></i>
                            </a>
                            </div> ';  
                })    
                ->hide('presensi_id') 
                ->toJson();  

    }   



}