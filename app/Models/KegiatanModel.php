<?php 
namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_kegiatan';
    protected $primaryKey       = 'id';
    protected $returnType       = "object"; 
    protected $allowedFields    = [
        'id',
        'nama_kgt',
        'keterangan_kgt',
        'anggota_id',
        'tgl_start_kgt',
        'tgl_end_kgt',  
        'created_at_kgt',
        'updated_at_kgt'
    ]; 
}