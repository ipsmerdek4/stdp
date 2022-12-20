<?php 
namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_anggota';  
    protected $primaryKey       = 'id';
    protected $returnType       = "object"; 
    protected $allowedFields    = [
        'nama_lengkap',
        'jabatan',
        'no_telp',
        'alamat',
        'foto',
        'log', 
        'tanggal_masuk',
        'created_at_agt',
        'updated_at_agt'
    ]; 
}