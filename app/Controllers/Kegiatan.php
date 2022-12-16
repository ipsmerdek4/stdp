<?php 
namespace App\Controllers;
 
use App\Models\KegiatanModel;


class Kegiatan extends BaseController{

    public function index()
    {
 
        return view('welcome_message');
    }

}