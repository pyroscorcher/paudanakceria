<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = "dokumens";

    protected $fillable = ["akta_kelahiran", "kk", "foto_anak", "ktp", "bukti_pembayaran", "user_id"];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

