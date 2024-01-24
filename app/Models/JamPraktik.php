<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JamPraktik extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'jam_praktik';

    protected $fillable = [
        'id',
        'id_cabang',
        'jam_mulai',
        'jam_selesai',
        'kuota',
        'status',
    ];
}
