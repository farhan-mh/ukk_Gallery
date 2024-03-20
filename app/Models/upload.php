<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class upload extends Model
{
    use HasFactory;

 public function getCreatedAttribute(){
    return Carbon::parse($this->attributes['created_at'])->translatedFormat('l,d F Y');
 }
 // Upload.php
public function likes()
{
    return $this->belongsToMany(User::class, 'likes', 'upload_id', 'user_id');
}

    protected $fillable = [
        'id',
        'idUser',
        'gambarUpload',
        'judul',
        'deskripsiUpload',
        'likes',
    ];
}
