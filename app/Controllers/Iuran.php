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

    
        $Anggota =  new AnggotaModel();
        $Iuran =  new IuranModel();


        $bulan = $Iuran->select('
                    DATE_FORMAT(created_at_iuran, "%m") as bulan,
                    DATE_FORMAT(created_at_iuran, "%Y") as tahun,
                    nominal_iuran,
                    sts_iuran,
                    created_at_iuran,
                    id
                    ')
                    ->like('created_at_iuran', (string)$tahun)
                    ->where('anggota_id', $anggota)
                    ->findAll();
        
        $nBulan = [];
        foreach ($bulan as $value) {
                if ($value->sts_iuran == 0) {
                   $nstatus = '<span class="badge badge-danger">Belum<br>Membayar</span>';
                }elseif ($value->sts_iuran == 1) {
                    $nstatus = '<span class="badge badge-success p-2">Sudah<br>Membayar</span>';
                }

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


                $pecah1 = explode(' ', $value->created_at_iuran);
                $ndate =  $pecah1[0].'<br>'.$pecah1[1];
                 
                $nBulan[] = [
                    'id'                    => $value->id,
                    'bulan'                 => $bulanX[$value->bulan],
                    'nominal_iuran'         => $value->nominal_iuran,
                    'status'                => $nstatus,
                    'tgl_bayar'             => $ndate
                ]; 
                 
            
        }

        $countR = $Iuran->select('
                            created_at_iuran,
                            anggota_id
                    ')
                    ->like('created_at_iuran', (string)$tahun)
                    ->where('anggota_id', $anggota)
                    ->countAllResults();

  
        
        session();
        $data = [   
            'tahunXX'           => $tahun,
            'user_id'           => $anggota,
            'countR'            => $countR,
            'iuran'             => $nBulan,
            'anggota'           => $Anggota->findAll(),
            'validation' 		=> \Config\Services::validation(), 
        ];

        return view('iuran/index', compact('data'));  
    }

    
    public function create()
    { 
        
        session();
        $data = [   
            'validation' 		=> \Config\Services::validation(), 
        ];

        return view('iuran/create', compact('data')); 

    }

    public function progress()
    {


        
       echo $bt = $this->request->getVar('b&t'); 
    }




}