<?php 
namespace App\Models;

use CodeIgniter\Model;

class IuranModel extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_iuran';
    protected $primaryKey       = 'id';
    protected $returnType       = "object"; 
    protected $allowedFields    = [ 
        // 'anggota_id',
        // 'tahun_iuran',
        // 'bulan_iuran',
        'nominal_iuran',
        'sts_iuran',
        'created_at_iuran',
        'updated_at_iuran',   
    ]; 
}