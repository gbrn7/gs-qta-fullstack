<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'sosmed';

    protected $fillable = [
        'nama',
        'link',
        'icon',
        'status',
    ];
}
