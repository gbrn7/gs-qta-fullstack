<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenHeader extends Model
{
    use HasFactory;

    protected $table = 'konten_header';

    protected $fillable = [
        'judul',
        'tagline',
        'deskripsi',
        'teks_btn',
    ];
}
