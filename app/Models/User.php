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
        'name',
        'nisn',
        'password',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempatlahir',
        'nis',
        'nomorseriijazah',
        'nik',
        'npsn',
        'asal_sekolah',
        'agama',
        'kebutuhankhusus',
        'alamat_rumah',
        'transportasi',
        'telp',
        'emailpribadi',
        'kks',
        'kps',
        'kip',
        'lintang',
        'bujur',
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
    ];

    /**
     * Get the enrollment record associated with the user.
     */
    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class);
    }
    public function orangtua()
    {
        return $this->hasOne(Orangtua::class);
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }

    public function data_periodik()
    {
        return $this->hasOne(DataPeriodik::class);
    }

    public function dokumen()
    {
        return $this->hasOne(Dokumen::class);
    }

    /**
     * Check if Data Anak is complete
     */
    public function isDataAnakComplete()
    {
        // If these required fields are filled, it means they passed the DataAnakController validation
        return !empty($this->nik) && !empty($this->tempatlahir) && !empty($this->alamat_rumah);
    }

    /**
     * Check if Data Orang Tua is complete
     */
    public function isDataOrangtuaComplete()
    {
        // Check if the relation exists AND a required field is filled
        return $this->orangtua && !empty($this->orangtua->nama_ayah) && !empty($this->orangtua->penghasilan_ayah);
    }

    /**
     * Check if Data Periodik is complete
     */
    public function isDataPeriodikComplete()
    {
        // Check if the relation exists AND a required field is filled
        return $this->data_periodik && !empty($this->data_periodik->tinggi_badan);
    }

    /**
     * Check if Upload Dokumen is complete
     */
    public function isDokumenComplete()
    {
        // Check if the relation exists and at least one mandatory document (like KK) is filled
        return $this->dokumen && !empty($this->dokumen->kk);
    }

    /**
     * Check if Admin has Verified the application
     */
    public function isVerifikasiComplete()
    {
        // Check if the pendaftaran relation exists and status is either Diterima or Ditolak
        return $this->pendaftaran && in_array($this->pendaftaran->status, ['Diterima', 'Ditolak']);
    }
}