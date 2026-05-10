<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    protected $table = 'orangtua'; 
    
    protected $fillable = [
        'user_id',
        'namaayah',
        'namaibu',
        'tahunlahirayah',
        'tahunlahiribu',
        'pekerjaanayah',
        'pekerjaanibu',
        'pendidikanayah',
        'pendidikanibu',
        'namawali',
        'tahunlahirwali',
        'pekerjaanwali',
        'pendidikanwali',
        'penghasilanayah',
        'penghasilanibu',
        'penghasilanwali'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}