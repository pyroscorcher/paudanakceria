<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPeriodik extends Model
{
    protected $table = "data_periodiks";

    protected $fillable = [
        'user_id',
        'tinggi_badan',
        'berat_badan',
        'jarak',
        'waktu',
        'jumlahsaudara',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
