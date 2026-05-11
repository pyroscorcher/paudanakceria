<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'user_id',
        'jenis',
        'tingkat',
        'nama',
        'tahun',
        'penyelenggara',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
