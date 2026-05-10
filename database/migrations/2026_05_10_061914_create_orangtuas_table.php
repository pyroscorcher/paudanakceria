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
        Schema::create('orangtuas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('namaayah');
            $table->string('namaibu');
            $table->string('tahunlahirayah')->nullable();
            $table->string('tahunlahiribu')->nullable();
            $table->string('pekerjaanayah')->nullable();
            $table->string('pekerjaanibu')->nullable();
            $table->string('pendidikanayah')->nullable();
            $table->string('pendidikanibu')->nullable();
            $table->string('namawali')->nullable();
            $table->string('tahunlahirwali')->nullable();
            $table->string('pekerjaanwali')->nullable();
            $table->string('pendidikanwali')->nullable( );
            $table->string('penghasilanayah')->nullable();
            $table->string('penghasilanibu')->nullable();
            $table->string('penghasilanwali')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orangtuas');
    }
};
