<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    protected $table = 'orangtuas'; 
    
    // You MUST add all the columns you want to update here
    protected $fillable = [
        'user_id',
        'nama_ayah',
        'nama_ibu',
        'tahun_lahir_ayah',
        'tahun_lahir_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'pendidikan_ayah',
        'pendidikan_ibu',
        'nama_wali',
        'tahun_lahir_wali',
        'pekerjaan_wali',
        'pendidikan_wali',
        'penghasilan_ayah',
        'penghasilan_ibu',
        'penghasilan_wali',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}