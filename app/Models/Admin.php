<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
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
}