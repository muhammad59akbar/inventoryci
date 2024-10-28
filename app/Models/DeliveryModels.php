<?php

namespace App\Models;

use CodeIgniter\Model;

class DeliveryModels extends Model
{
    protected $table      = 'resPengiriman';
    protected $primaryKey = 'id_pengiriman';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_approve', 'no_resi', 'nama_penerima', 'foto_penerima', 'status'];
}
