<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Standard Laravel primary key (creates a bigint unsigned named 'id')
            $table->string('name'); // Changed from 'nama'
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); // Required by standard Laravel Auth
            $table->string('password');
            
            // Your custom demographic fields
            $table->string('jenis_kelamin');
            $table->string('nisn');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('nama_orangtua');
            
            $table->rememberToken(); // Required for "Remember Me" functionality
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};