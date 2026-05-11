<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nisn')->unique();
            $table->string('password');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('tempatlahir')->nullable();
            $table->string('nis', 20)->unique()->nullable();
            $table->string('nomorseriijazah')->nullable();
            $table->string('nomorseriskhun')->nullable();
            $table->string('nomorseriun')->nullable();
            $table->string('nik')->nullable();
            $table->string('npsn')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('agama')->nullable();
            $table->string('kebutuhankhusus')->nullable();
            $table->string('alamat_rumah');
            $table->string('transportasi')->nullable();
            $table->string('telp')->nullable();
            $table->string('emailpribadi')->nullable();
            $table->string('kks')->nullable();
            $table->string('kps')->nullable();
            $table->string('kip')->nullable();
            $table->string('lintang')->nullable();
            $table->string('bujur')->nullable();

            


            $table->rememberToken();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};