<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'access_token',
        'oauth_token',
    ];

   
    protected $hidden = [
        'password',
        
    ];

    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }

    
}
