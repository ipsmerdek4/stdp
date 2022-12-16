<?php 
namespace App\Controllers;

use App\Models\PresensiModel;


class Presensi extends BaseController{

    public function index()
    {
 
        return view('welcome_message');
    }
}