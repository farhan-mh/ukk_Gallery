<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpProfil extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUser',
        'emailUser',
        'avatar',
        'background',
        'deskripsi',
    ];
}
