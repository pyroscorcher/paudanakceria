<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pendaftaran';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nama',
        'tanggal_lahir',
        'nama_ayah',
        'nama_ibu',
        'telp',
        'jenis_kelamin',
        'alamat_rumah',
        'nisn',
        'password',
        'status',
    ];

    /**
     * Get the user that owns the enrollment record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}