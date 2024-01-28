<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_cabang',
        'id_jam_praktik',
        'jam_mulai',
        'jam_selesai',        
        'nama_pasien',
        'alamat',
        'no_telepon',
        'tanggal_reservasi',
        'keluhan',
    ];
    
    public function cabang(){
        return $this->belongsTo(Cabang::class, 'id_cabang');
    }
    
    public function jamPraktik(){
        return $this->belongsTo(JamPraktik::class, 'id_jam_praktik');
    }


}
