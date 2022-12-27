<?php 
namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_laporan';
    protected $primaryKey       = 'id';
    protected $returnType       = "object"; 
    protected $allowedFields    = [
        'anggota_id',
        'judul_lpr',
        'ket_lpr',
        'file_lpr',
        'created_at_lpr',
        'updated_at_lpr',   
    ]; 
}