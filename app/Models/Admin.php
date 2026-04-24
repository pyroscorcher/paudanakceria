<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Critical import
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'nama_admin',
        'username',
        'password',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}