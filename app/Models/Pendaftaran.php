<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    // Explicitly define the table name if it doesn't follow standard pluralization
    protected $table = 'pendaftaran';

    // Protect against Mass Assignment vulnerabilities
    protected $fillable = [
        'user_id',
        'nama',
        'jenis_kelamin',
        'nisn',
        'tanggal_lahir',
        'tempat_lahir',
        'nama_orangtua',
        'status',
    ];

    // Cast the date field to a Carbon instance for easier date manipulation
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Define the inverse one-to-one or one-to-many relationship.
     * A Pendaftaran record belongs to a specific User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}