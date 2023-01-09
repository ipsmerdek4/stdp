<?php 
namespace App\Controllers;
 
use App\Models\KegiatanModel;
use App\Models\AnggotaModel;
 
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
        $Anggota = new AnggotaModel(); 
        $builder = $Anggota->where('id', user_id())->first();

        $data = [
            'build' => $builder,
        ];

        return view('kegiatan/index', $data);
    }


    public function views_kegiatan()
    {
        $Kegiatan = new KegiatanModel(); 
        $builder = $Kegiatan
                    ->join('tbl_anggota', 'tbl_kegiatan.anggota_id = tbl_anggota.id')
                    ->select(' 
                        tbl_kegiatan.id as kode_id, 
                        tbl_kegiatan.nama_kgt as nama_kgt,  
                        tbl_kegiatan.tgl_start_kgt as tgl_start_kgt, 
                        tbl_kegiatan.tgl_end_kgt as tgl_end_kgt, 
                        tbl_kegiatan.keterangan_kgt as keterangan_kgt,
                        tbl_kegiatan.sts_kgt as sts_kgt,
                        tbl_anggota.nama_lengkap as nama_lengkap, 
                        tbl_kegiatan.id as kegiatan_id, 
                    '); 

            return DataTable::of($builder)
                // ->addNumbering('no')   
                ->edit('kode_id', function($row){ 
                    $v = '<p class="font-weight-bold">#KGT~'.$row->kode_id.'</p>';
                    return $v ;
                })  
                ->edit('tgl_end_kgt', function($row){
                    $vv = explode(' ', $row->tgl_end_kgt);
                    $vvv = explode('-', $vv[0]);
                    $v = '<p class="font-weight-bold">'.$vvv[2].'-'.$vvv[1].'-'.$vvv[0].'</p>';
                    return $v ;
                })  
                ->edit('sts_kgt', function($row){ 
                    if ($row->sts_kgt == 0) {
                        $v = '<p class="font-weight-bold text-danger">Tidak Aktiv</p>';
                    }else{
                        $v = '<p class="font-weight-bold text-success"> Aktiv</p>';
                    }
                    return $v ;
                })  
                ->edit('tgl_start_kgt', function($row){
                    $vv = explode(' ', $row->tgl_start_kgt);
                    $vvv = explode('-', $vv[0]);
                    $v = '<p class="font-weight-bold mx-auto" style="width:95px">'.$vvv[2].'-'.$vvv[1].'-'.$vvv[0].'</p>';
                    return $v ;
                })  
                ->edit('keterangan_kgt', function($row){

                    $v  =  '<a href="javascript:void(0)" data-id="'. $row->keterangan_kgt .'" class="btn btn-warning btn-sm pt-1 v-ket-kgt" data-toggle="modal"  data-target="#v-ket-kgt"  data-backdrop="static" data-keyboard="false" style="width:33px;">
                                <i class="fa-solid fa-up-right-from-square fa-sw"></i>
                            </a>'; 
                    return $v ;
                })  
                ->add('action', function($row){
                    return    ' 
                            <div class="btn-group" role="group" aria-label="Basic example"> 
                            <a href="javascript:void(0)" data-id="'. $row->kegiatan_id .'" class="btn btn-success btn-sm pt-1 e-kgt" style="width:33px;">
                                <i class="fa-solid fa-pen-to-square fa-sm"></i>
                            </a> 
                            <a data-id="'. $row->kegiatan_id .'" href="javascript:void(0)" class="btn btn-danger btn-sm pt-1 d-kgt" style="width:33px;">
                                <i class="fa-solid fa-trash-xmark fa-sm"></i>
                            </a>
                            </div> ';
                })    
                ->hide('kegiatan_id') 
                ->toJson();  

    }   

    public function create()
    { 
        
        $Anggota = new AnggotaModel(); 
        $builder = $Anggota->where('id', user_id())->first();

        $build = $builder;


        session();
        $data = [   
            'validation' 		=> \Config\Services::validation(), 
        ];

        return view('kegiatan/create', compact('data', 'build')); 

    }
 
    public function pogress()
    {
         

 
        if (!$this->validate([  
            'kegiatan'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Kegiatan Harus di isi.', 	 
                    ]
            ], 
            'ket_kegiatan'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Ketarangan Kegiatan Harus di isi.', 	 
                    ]
            ], 
            'str_date'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Tanggal Mulai Harus di isi.', 	 
                    ]
            ], 
            'brk_date'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Tanggal Berakhir Harus di isi.', 	 
                    ]
            ], 
        ])) {
            $validation = \Config\Services::validation();  
            return redirect()->to('/kegiatan/create')->withInput();
        }
  
 

        $kegiatan       = $this->request->getVar('kegiatan'); 
        $ket_kegiatan   = $this->request->getVar('ket_kegiatan'); 
        $ket_kegiatan1   = str_replace("../Asset/textarea_editor/source", "/Asset/textarea_editor/source", $ket_kegiatan  );
        
        $str_date       = $this->request->getVar('str_date'); 
        $brk_date       = $this->request->getVar('brk_date');  
 
            $data1 = [ 
                'nama_kgt'          => $kegiatan,
                'keterangan_kgt'    => $ket_kegiatan1,
                'anggota_id'        => user_id(),
                'tgl_start_kgt'     => $str_date,
                'tgl_end_kgt'       => $brk_date,
                'sts_kgt'           => 1,
                'created_at_kgt'    => date("Y-m-d H:i:s"),
                'updated_at_kgt'    => null 
            ];
 
            $Kegiatan = new KegiatanModel();
            $Kegiatan->insert($data1);  

            session()->setFlashdata('msg_sccs', 'Berhasil Menambah Data Kegiatan.');
            return redirect()->to(base_url('kegiatan'))->withInput();   
  



    }
 
    public function edit($var)
    { 
        

        $Kegiatan = new KegiatanModel(); 
        $builder = $Kegiatan
                        ->join('tbl_anggota', 'tbl_kegiatan.anggota_id = tbl_anggota.id')
                        ->select('
                                tbl_kegiatan.nama_kgt as nama_kgt,  
                                tbl_kegiatan.tgl_start_kgt as tgl_start_kgt, 
                                tbl_kegiatan.tgl_end_kgt as tgl_end_kgt, 
                                tbl_kegiatan.keterangan_kgt as keterangan_kgt,
                                tbl_kegiatan.sts_kgt as sts_kgt,
                                tbl_anggota.nama_lengkap as nama_lengkap,  
                                tbl_kegiatan.id as kegiatan_id'
                        )
                        ->where('tbl_kegiatan.id', $var)
                        ->first();                 


        $Anggota = new AnggotaModel(); 
        $builderX = $Anggota->where('id', user_id())->first();

        $build = $builderX;

        session();
        $data = [   
            'data'              => $builder,
            'validation' 		=> \Config\Services::validation(), 
        ];

        return view('kegiatan/edit', compact('data','build')); 
    }
 
    public function progres_update($var)
    {
        
 
        if (!$this->validate([  
            'kegiatan'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Kegiatan Harus di isi.', 	 
                    ]
            ], 
            'ket_kegiatan'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Ketarangan Kegiatan Harus di isi.', 	 
                    ]
            ], 
            'str_date'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Tanggal Mulai Harus di isi.', 	 
                    ]
            ], 
            'brk_date'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Tanggal Berakhir Harus di isi.', 	 
                    ]
            ], 
        ])) {
            $validation = \Config\Services::validation();  
            return redirect()->to('/kegiatan/edit/'.$var)->withInput();
        }
    
            $kegiatan       = $this->request->getVar('kegiatan'); 
            $ket_kegiatan   = $this->request->getVar('ket_kegiatan'); 
            $str_date       = $this->request->getVar('str_date'); 
            $brk_date       = $this->request->getVar('brk_date'); 
            
            $sts_kgt        = $this->request->getVar('status'); 
            
 
            $data1 = [ 
                'nama_kgt'          => $kegiatan,
                'keterangan_kgt'    => $ket_kegiatan,
                'anggota_id'        => user_id(),
                'tgl_start_kgt'     => $str_date,
                'tgl_end_kgt'       => $brk_date, 
                'sts_kgt'           => $sts_kgt,
                'updated_at_kgt'    => date("Y-m-d H:i:s")  
            ];


            $Kegiatan = new KegiatanModel();  
            $Kegiatan->update($var, $data1);

          

        session()->setFlashdata('msg_sccs', 'Berhasil Merubah Data Kegiatan.');
        return redirect()->to(base_url('/kegiatan'));



    }
 
    public function delete($var)
    {
        
        $Kegiatan = new KegiatanModel();    
        $Kegiatan->delete($var);  
 
        session()->setFlashdata('msg_sccs', 'Berhasil Menghapus Data Kegiatan.');
        return redirect()->to(base_url('/kegiatan'));


    }




}