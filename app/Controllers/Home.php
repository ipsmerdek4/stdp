<?php

namespace App\Controllers;

use App\Models\AnggotaModel; 
use App\Models\IuranModel; 
use App\Models\KegiatanModel; 

class Home extends BaseController
{
    public function index()
    {
        $Iuran      = new IuranModel();
        $Anggota    = new AnggotaModel();
        $Kegiatan   = new KegiatanModel(); 
        $builder    = $Anggota->where('id', user_id())->first();


        $jml_anggota = $Anggota->countAllResults();
        $jml_Iuran = $Iuran->where('sts_iuran', 1)->findAll();

        $hasil_iuran =  0;
        foreach ($jml_Iuran as $v) {
            $hasil_iuran += $v->nominal_iuran;
        }

        $pengumanan  = $Kegiatan->orderBy('tgl_start_kgt', 'desc')->paginate(5, 'kegiatan') ; 
        $kegiatan_pager         = $Kegiatan->pager;



        $data = [ 
            'kegiatan_pager'        => $kegiatan_pager,
            'pengumanan'            => $pengumanan,
            'hasil_iuran'           => $hasil_iuran,
            'jml_anggota'           => $jml_anggota,
            'build'                 => $builder,
        ];

        return view('home', $data);
    }


    public function view_home()
    { 
        $id       = $this->request->getVar('id'); 
        $Kegiatan   = new KegiatanModel(); 
        $pengumanan  = $Kegiatan->where('id', $id)->first(); 

       
        $v_pemumuman = $pengumanan->keterangan_kgt; 
 
        echo json_encode($v_pemumuman);
    }








}
