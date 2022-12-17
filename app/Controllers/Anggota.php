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
                            users.id as user_id
                        '); 

        return DataTable::of($builder)
                ->addNumbering('no')  
                ->edit('active', function($row){
                    if ($row->active == 1) {
                        $v = '<span class="badge badge-success">Active</span>';
                    } else {
                        $v = '<span class="badge badge-danger">No Active</span>'; 
                    }
                    return $v;
                })  
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

    public function create()
    { 
        
        session();
        $data = [   
            'validation' 		=> \Config\Services::validation(), 
        ];

        return view('anggota/create', compact('data')); 

    }

    public function pogress()
    {
         

 
        if (!$this->validate([ 
            'foto_anggota'    =>  [ 
                'rules' =>  'is_image[foto_anggota]'
                            .'|mime_in[foto_anggota,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                            .'|max_size[foto_anggota,5000]' ,  
                'errors' => [    		
                    'is_image' => 'File harus berformat Gambar.',
                    'mime_in' => 'File yang di izinkan image/jpg, image/jpeg,image/gif,image/png, image/webp.',   
                    'max_size' => 'Ukuran File Paling besar 1Mb.',    
                    'max_dims' => 'Ukuran Gambar Max 800x800.',   
                ]
            ], 
            'nama_anggota'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Nama Lengkap Harus di isi.', 	 
                    ]
            ],  
            'Jabatan'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Jabatan Belum anda pilih.', 	 
                    ]
            ],  
            'telp'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Nomer Telp Harus di isi.', 	 
                    ]
            ],  
            'alamat'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Alamat Harus di isi.', 	 
                    ]
            ],  
            'alamat'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Alamat Harus di isi.', 	 
                    ]
            ],  
            'Status'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Status Belum anda pilih.', 	 
                    ]
            ],  
            'email'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Email Harus di isi.', 	 
                    ]
            ], 
            'username'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Username Harus di isi.', 	 
                    ]
            ], 
            'password'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Password Harus di isi.', 	 
                    ]
            ], 
            'date_anggota'    =>  [ 
                'ruler'   => 'required' ,
                'errors'    => [
                    'required'  => 'Tanggal Masuk Harus di isi.', 	 
                    ]
            ], 
        ])) {
            $validation = \Config\Services::validation();  
            return redirect()->to('/anggota/create')->withInput();
        }


        if ($img = $this->request->getFile('foto_anggota')) { 
            if ($img->isValid() && ! $img->hasMoved())
            {
                $newName = $img->getRandomName();
                $img->move('Foto/anggota/', $newName);     
            }  else{
                $newName = "";             
            }
        }
 
        // 
        $Anggota = new AnggotaModel();
        $check = $Anggota
                ->orderBy('id', 'DESC')
                ->first();

        $id = $check->id + 1;      
        $date_anggota = $this->request->getVar('date_anggota'); 
        $nama_anggota = $this->request->getVar('nama_anggota'); 
        $Jabatan = $this->request->getVar('Jabatan'); 
        $telp = $this->request->getVar('telp'); 
        $alamat = $this->request->getVar('alamat'); 
        $Status = $this->request->getVar('Status'); 
        $email = $this->request->getVar('email'); 
        $username = $this->request->getVar('username'); 
        $password = $this->request->getVar('password');  
 

        $jabatanarry = [
                '1' => 'Sekretaris',
                '2' => 'Bendahara',
                '3' => 'Ketua dan Wakil',
                '4' => 'Anggota',
        ];

        // if ($newName == "") {
            $data1 = [
                'id' =>  $id,
                'nama_lengkap' => $nama_anggota,
                'jabatan' => $jabatanarry[$Jabatan],
                'no_telp' =>  $telp,
                'alamat' => $alamat,
                'foto' => $newName,
                'log' => $password.',',
                'tanggal_masuk' => $date_anggota,
            ];
            $data2 = [
                'id'    => $id,
                'anggota_id' =>  $id,
                'email' => $email,
                'username' => $username,
                'password_hash' => \Myth\Auth\Password::hash($password),
                'active' => $Status, 
                'created_at' => date("Y-m-d H:i:s")
            ];
            $data3 = [
                'group_id'      => $Jabatan,
                'user_id'       => $id, 
            ];

            $Anggota->insert($data1); 
            $this->builder2->insert($data2); 
            $this->builder3->insert($data3); 

            session()->setFlashdata('msg_sccs', 'Berhasil Menambah Data Anggota.');
            return redirect()->to(base_url('anggota'))->withInput();  




        /* }else{

        }  */





    }


    public function update()
    {
        # code...
    }


    public function progres_update()
    {
        # code...
    }

    public function delete()
    {
        # code...
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