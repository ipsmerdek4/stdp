<?php 
namespace App\Controllers;

use App\Models\IuranModel;
use App\Models\AnggotaModel;
use \Hermawan\DataTables\DataTable;
use PHPSQLParser\builders\Builder;

 


class Iuran extends BaseController{

    public function __construct()
    {
      $this->db = \Config\Database::connect();
      $this->builder = $this->db->table('auth_groups');
      $this->builder2 = $this->db->table('users');
      $this->builder3 = $this->db->table('auth_groups_users');
    }

    public function index()
    {    


        $tahun      = $this->request->getVar('tahun'); 
        $anggota    = $this->request->getVar('anggota');  
    
        if (isset($anggota)) { 
            $anggota    = $this->request->getVar('anggota');  
        }else{ 
            $anggota    = user_id();  
        }
    
        if (isset($tahun)) { 
            $tahun      = $this->request->getVar('tahun'); 
        }else{ 
            $tahun      = date("Y"); 
        }

    
        $Anggota    =  new AnggotaModel();
        $Iuran      =  new IuranModel();

 
        /* 
            $bulanX = [
                '1' => "Januari", 
                '2' => "Februari", 
                '3' => "Maret", 
                '4' => "April", 
                '5' => "Mei", 
                '6' => "Juni", 
                '7' => "Juli", 
                '8' => "Agustus", 
                '9' => "September", 
                '10' => "Oktober", 
                '11' => "November", 
                '12' => "Desember"
            ];
            
        

            $nBulan = [];
            for ($i=1; $i <= 12 ; $i++) {  
                $bulansss = $Iuran
                                ->where('tahun_iuran', $tahun)
                                ->where('bulan_iuran', $i)
                                ->where('anggota_id ', $anggota)
                                ->first();
    

                if (isset($bulansss->created_at_iuran)) {
                    $pecah1 = explode(' ', $bulansss->created_at_iuran);
                    $ndate =  $pecah1[0].'<br>'.$pecah1[1];
                }else{
                    $ndate =  '';
                }
            
                
                $nBulan[] = [
                    'datem'                 => $i,
                    'bulan'                 => $bulanX[$i],
                    'nominal_iuran'         => (isset($bulansss->nominal_iuran))? $bulansss->nominal_iuran : 0,
                    'status'                => (isset($bulansss->sts_iuran))? $bulansss->sts_iuran : 0,
                    'tgl_bayar'             => $ndate,
                    'id'                    => (isset($bulansss->id))? $bulansss->id : '',
                ]; 
            }

        

            $countR = $Iuran->select('
                                created_at_iuran,
                                anggota_id
                        ')
                        ->like('created_at_iuran', (string)$tahun)
                        ->where('anggota_id', $anggota)
                        ->countAllResults();

        */


        $Anggota = new AnggotaModel(); 
        $builder = $Anggota->where('id', user_id())->first();

        $build = $builder;

        

        $get_kas = $Iuran
                        ->where('anggota_id', $anggota)         
                        ->where('tahun_iuran', $tahun)   
                        ->findAll();

        $harga_masuk = 0;
        $harga_keluar = 0;
        foreach ($get_kas as $v) {
            if ($v->sts_iuran == 1) {
                $harga_masuk += $v->nominal_iuran;
            }elseif ($v->sts_iuran == 2) {
                $harga_keluar += $v->nominal_iuran;
            } 
        }

        $total = $harga_masuk - $harga_keluar;


        session();
        $data = [   
            'tahunXX'           => $tahun,
            'user_id'           => $anggota,
            'get_kas'           => $get_kas,
            'harga_masuk'       => $harga_masuk,
            'harga_keluar'      => $harga_keluar,
            'total'             => $total,
            // 'countR'            => $countR,
            // 'iuran'             => $nBulan,


            'anggota'           => $Anggota->findAll(),
            'validation' 		=> \Config\Services::validation(), 
        ];

        return view('iuran/index', compact('data', 'build'));  
        // return view('iuran/index', compact('data'));  
        
    }

    
    public function create($var)
    { 
        
        $nvar = (isset($var))? $var : date("Y-m-d"); 

        $Anggota =  new AnggotaModel();

        $Anggota = new AnggotaModel(); 
        $builder = $Anggota->where('id', user_id())->first();

        $build = $builder;


        session();
        $data = [      
            'var'               => $nvar,
            'anggota'           => $Anggota->findAll(),
            'validation' 		=> \Config\Services::validation(), 
        ];

        return view('iuran/create', compact('data','build')); 

    }

    public function progress()
    {
 
        $bt = explode("-", $this->request->getVar('b&t'));  
        $anggota = $this->request->getVar('anggota');  

        $Iuran =  new IuranModel();
        // $check = $Iuran
        //             ->where('tahun_iuran', $bt[0])
        //             ->where('bulan_iuran', $bt[1])
        //             ->where('anggota_id', $anggota)
        //             ->countAllResults();
        
        // if ($check > 0) {
        //     session()->setFlashdata('error', 'Maaf, Data yang anda masukan sudah tersedia.');
        //     return redirect()->to(base_url('kas/create/'.$this->request->getVar('b&t')));
        // }else{
            if (!$this->validate([  
                'anggota'    =>  [ 
                    'ruler'   => 'required' ,
                    'errors'    => [
                        'required'  => 'Anggota Harus di Pilih.', 	 
                        ]
                ], 
                'tipe'    =>  [ 
                    'ruler'   => 'required' ,
                    'errors'    => [
                        'required'  => 'Tipe Pembayaran Harus di isi.', 	 
                        ]
                ],  
                'iuran'    =>  [ 
                    'ruler'   => 'required' ,
                    'errors'    => [
                        'required'  => 'Kas Harus di isi.', 	 
                        ]
                ],  
            ])) {
                $validation = \Config\Services::validation();  
                return redirect()->to('kas/create/'.$this->request->getVar('b&t'))->withInput();
            }
  
            $iuran      = preg_replace("/[^0-9]/", "", $this->request->getVar('iuran')); 
            $tipe       = $this->request->getVar('tipe');  

            $data1 = [ 
                'anggota_id'        => $anggota,
                'tahun_iuran'       => $bt[0],
                'bulan_iuran'       => $bt[1],
                'nominal_iuran'     => $iuran,
                'sts_iuran'         => $tipe, 
                'created_at_iuran'  => date("Y-m-d H:i:s"), 
                'updated_at_iuran'  => null 
            ];

 
            $Iuran->insert($data1);

          

            session()->setFlashdata('msg_sccs', 'Berhasil Menambah Data Kas Bulanan.');
            return redirect()->to(base_url('/kas'));
        // }

    }


    public function edit($var)
    { 
            
        $nvar = (isset($var))? $var : '';

        $Anggota =  new AnggotaModel();
        $Iuran =  new IuranModel(); 
        
        
        $builder = $Anggota->where('id', user_id())->first();

        $build = $builder;


        session();
        $data = [      
            'data'              => $Iuran->where('id', $nvar)->first(),
            'anggota'           => $Anggota->findAll(),
            'validation' 		=> \Config\Services::validation(), 
        ];

        return view('iuran/edit', compact('data','build')); 

    }


    
    public function progres_update($var)
    {
         
            if (!$this->validate([   
                'b&t'    =>  [ 
                    'ruler'   => 'required' ,
                    'errors'    => [
                        'required'  => 'Tanggal Pembayaran Harus di isi.', 	 
                        ]
                ],  
                'tipe'    =>  [ 
                    'ruler'   => 'required' ,
                    'errors'    => [
                        'required'  => 'Tipe Pembayaran Harus di isi.', 	 
                        ]
                ],  
                'eiuran'    =>  [ 
                    'ruler'   => 'required' ,
                    'errors'    => [
                        'required'  => 'Kas Harus di isi.', 	 
                        ]
                ],  
            ])) {
                $validation = \Config\Services::validation();  
                return redirect()->to('kas/edit/'.$var)->withInput();
            }


            $iuran      = preg_replace("/[^0-9]/", "", $this->request->getVar('eiuran'));   
            $tipe       =  $this->request->getVar('tipe');   
            $bt         =  $this->request->getVar('b&t').' '.date("H:i:s");   
 
            $data1 = [  
                'sts_iuran'         => $tipe, 
                'nominal_iuran'     => $iuran, 
                'created_at_iuran'  => $bt, 
                'updated_at_iuran'  => date("Y-m-d H:i:s") 
            ];
 
            $Iuran =  new IuranModel(); 
            $Iuran->update($var, $data1);
 

            session()->setFlashdata('msg_sccs', 'Berhasil Merubah Data Kas Bulanan.');
            return redirect()->to(base_url('/kas'));
       


 

    }


    public function delete($var)
    {
        
        $Iuran =  new IuranModel(); 
        $Iuran->delete($var);  
 
        session()->setFlashdata('msg_sccs', 'Berhasil Menghapus Data Transaksi Pembayaran Kas Bulanan.');
        return redirect()->to(base_url('/kas'));


    }


 

}