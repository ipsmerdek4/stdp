<?php

namespace App\Controllers;

use App\Models\AnggotaModel; 

class Home extends BaseController
{
    public function index()
    {

        $Anggota = new AnggotaModel(); 
        $builder = $Anggota->where('id', user_id())->first();

        $data = [
            'build' => $builder,
        ];

        return view('home', $data);
    }
}
