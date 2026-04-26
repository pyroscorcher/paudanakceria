<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            
            // Foreign key linking to the users table. 
            // 'cascade' means if the User is deleted, their enrollment is also deleted.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Enrollment Data
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']); // L for Laki-laki, P for Perempuan
            $table->string('nisn')->unique();
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('nama_orangtua');
            
            // System State
            $table->string('status')->default('Pending');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};