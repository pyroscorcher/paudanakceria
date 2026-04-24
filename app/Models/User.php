<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // Updated to 'name'
        'email',
        'password',
        'jenis_kelamin',
        'nisn',
        'tanggal_lahir',
        'tempat_lahir',
        'nama_orangtua',
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
        'tanggal_lahir' => 'date',
    ];

    /**
     * Relationship: A User has many Pendaftaran (Enrollments).
     */
    public function pendaftaran()
    {
        // Because we are using Laravel defaults, we don't need to specify the keys!
        return $this->hasMany(Pendaftaran::class);
    }
}