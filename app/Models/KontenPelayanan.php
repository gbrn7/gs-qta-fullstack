<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenPelayanan extends Model
{
    use HasFactory;

    protected $table = 'konten_pelayanan';

    public $timestamps = false;

    protected $fillable = [
        'judul',
        'deskripsi',
        'thumbnail',
        'status',
    ];
}
