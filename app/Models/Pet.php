<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'nama',
        'jenis',
        'umur',
        'gender',
        'deskripsi',
        'foto',
        'status'
    ];
}
