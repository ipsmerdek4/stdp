<?php 
namespace App\Controllers;


use App\Models\LaporanModel;
use App\Models\AnggotaModel;

use \Hermawan\DataTables\DataTable;

class Laporan extends BaseController{


    public function index()
    {
        $Anggota = new AnggotaModel(); 
        $builder = $Anggota->where('id', user_id())->first();

        $data = [
            'build' => $builder,
        ];
        return view('laporan/index', $data ); 
    }

    public function create()
    { 
        $Anggota = new AnggotaModel(); 
        $builder = $Anggota->where('id', user_id())->first();

        $build  =  $builder ;
        
        session();
        $data = [   
            'validation' 		=> \Config\Services::validation(), 
        ];

        return view('laporan/create', compact('data','build' )); 

    }
 
    public function progress()
    {
         

 
        if (!$this->validate([  
            'fileup' => [
                'rules' =>  'max_size[fileup, 5000]' ,  
                'errors' => [      
                    'max_size' => 'Ukuran File Paling besar 5Mb.',     
                ]
            ], 
            'judul'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Judul Laporan Harus di isi.', 	 
                    ]
            ], 
            'keterangan'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Ketearangan Laporan Harus di isi.', 	 
                    ]
            ], 
        ])) {
            $validation = \Config\Services::validation();  
            return redirect()->to('/laporan/create')->withInput();
        }
  

        if ($img = $this->request->getFile('fileup')) { 
            if ($img->isValid() && ! $img->hasMoved())
            {
                $newName = $img->getRandomName();
                $img->move('uploads/', $newName);     
            }  else{
                $newName = "";             
            }
        }

        $judul = $this->request->getVar('judul'); 
        $keterangan = $this->request->getVar('keterangan'); 

        if ($newName == "") {

            $data1 = [ 
                'anggota_id'         => user_id(),
                'judul_lpr'          => $judul,
                'ket_lpr'            => $keterangan,
                'file_lpr'           => $newName,
                'created_at_lpr'     => date("Y-m-d H:i:s"), 
                'updated_at_lpr'     => null  
            ];

        }else{

            $data1 = [ 
                'anggota_id'         => user_id(),
                'judul_lpr'          => $judul,
                'ket_lpr'            => $keterangan,
                'file_lpr'           => $newName,
                'created_at_lpr'     => date("Y-m-d H:i:s"), 
                'updated_at_lpr'     => null  
            ];

        }
 
            $Laporan = new LaporanModel();
            $Laporan->insert($data1);  

            session()->setFlashdata('msg_sccs', 'Berhasil Menambah Data Laporan.');
            return redirect()->to(base_url('laporan'))->withInput();   
 



    }


    
    public function views_()
    {
        $Laporan = new LaporanModel(); 
        $builder = $Laporan
                        ->join('tbl_anggota', 'tbl_laporan.anggota_id = tbl_anggota.id') 
                        ->select('
                                tbl_laporan.created_at_lpr as created_at_lpr,
                                tbl_laporan.judul_lpr as judul_lpr, 
                                tbl_laporan.ket_lpr as ket_lpr,
                                tbl_laporan.file_lpr as file_lpr, 
                                tbl_anggota.nama_lengkap as nama_lengkap,  
                                tbl_laporan.id as laporan_id,
                                '); 

            return DataTable::of($builder)
                ->addNumbering('no')  
                ->edit('file_lpr', function($row){
                    $v  =  '<a href="'.base_url().'/uploads/'.$row->file_lpr.'" class="btn btn-dark btn-sm pt-1 " target="_blank">
                                <i class="fa-solid fa-download  fa-sm"></i>
                                Download
                            </a>'; 
                    return $v ;
                })  
                ->edit('created_at_lpr', function($row){
                    $vv = explode(' ', $row->created_at_lpr );
                    $vvv = explode('-', $vv[0]);
                    $v = '  <p class="font-weight-bold mx-auto mb-0" style="width:95px">'.$vvv[2].'-'.$vvv[1].'-'.$vvv[0].'<br>'.$vv[1].'</p>';
                    return $v ;
                })    
                ->add('action', function($row){
                   return   ' 
                            <div class="btn-group" role="group" aria-label="Basic example"> 
                            <a href="javascript:void(0)" data-id="'. $row->laporan_id .'" class="btn btn-success btn-sm pt-1 e-kgt" style="width:33px;">
                                <i class="fa-solid fa-pen-to-square fa-sm"></i>
                            </a> 
                            <a data-id="'. $row->laporan_id .'" href="javascript:void(0)" class="btn btn-danger btn-sm pt-1 d-kgt" style="width:33px;">
                                <i class="fa-solid fa-trash-xmark fa-sm"></i>
                            </a>
                            </div> ';  
                })    
                ->hide('laporan_id') 
                ->toJson();  

    }   




    public function edit($var)
    { 
        $Laporan = new LaporanModel();

        $builder = $Laporan->where('id', $var)->first();

        $Anggota = new AnggotaModel(); 
        $builderX = $Anggota->where('id', user_id())->first();

        $build  =  $builderX ;

        session();
        $data = [    
            'laporan'           => $builder,
            'validation' 		=> \Config\Services::validation(), 
        ];

        return view('laporan/edit', compact('data','build')); 
    }



    public function progres_update($var)
    {
        
 
        if (!$this->validate([  
            'fileup' => [
                'rules' =>  'max_size[fileup, 5000]' ,  
                'errors' => [      
                    'max_size' => 'Ukuran File Paling besar 5Mb.',     
                ]
            ], 
            'judul'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Judul Laporan Harus di isi.', 	 
                    ]
            ], 
            'keterangan'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Ketearangan Laporan Harus di isi.', 	 
                    ]
            ], 
        ])) {
            $validation = \Config\Services::validation();  
            return redirect()->to('/laporan/edit/'.$var)->withInput();
        }
    
           

        if ($img = $this->request->getFile('fileup')) { 
            if ($img->isValid() && ! $img->hasMoved())
            {
                $newName = $img->getRandomName();
                $img->move('uploads/', $newName);     
            }  else{
                $newName = "";             
            }
        }

        $judul = $this->request->getVar('judul'); 
        $keterangan = $this->request->getVar('keterangan'); 

        if ($newName == "") {

            $data1 = [  
                'judul_lpr'          => $judul,
                'ket_lpr'            => $keterangan, 
                'updated_at_lpr'     => date("Y-m-d H:i:s")
            ];

        }else{

            echo $efileup = $this->request->getVar('efileup');  
            @unlink("uploads/".$efileup);


            
            $data1 = [  
                'judul_lpr'          => $judul,
                'ket_lpr'            => $keterangan,
                'file_lpr'           => $newName, 
                'updated_at_lpr'     => date("Y-m-d H:i:s")   
            ];

        }
 
            $Laporan = new LaporanModel();
            $Laporan->update($var, $data1);
 
            session()->setFlashdata('msg_sccs', 'Berhasil Merubah Data Laporan.');
            return redirect()->to(base_url('/laporan'));



    }


    public function delete($var)
    {        
        $Laporan = new LaporanModel();
        
        $lihatdata = $Laporan->where('id', $var)->first(); 
        @unlink("uploads/".$lihatdata->file_lpr);

        $Laporan->delete($var);  

        

        session()->setFlashdata('msg_sccs', 'Berhasil Menghapus Data Laporan.');
        return redirect()->to(base_url('/laporan'));


    }









}