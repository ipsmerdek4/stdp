<?php 
namespace App\Models;

use CodeIgniter\Model;

class PresensiModel extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_presensi';
    protected $primaryKey       = 'id';
    protected $returnType       = "object"; 
    protected $allowedFields    = [
        'id',
        'anggota_id',
        'kegiatan_id',
        'created_at_prsn',
        'updated_at_prsn', 
    ]; 
}