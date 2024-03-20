<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function getUpdatedAtAttritbute($value){
        return Carbon::parse($value)->diffForHumans();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     public function uploads()
     {
         return $this->hasMany(Upload::class, 'idUser');
     }
     
     // Upload model
     public function user()
     {
         return $this->belongsTo(User::class, 'idUser');
    }
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
