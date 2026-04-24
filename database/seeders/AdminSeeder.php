<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records to prevent duplicates if run multiple times
        DB::table('admins')->truncate();

        DB::table('admins')->insert([
            'nama_admin' => 'System Administrator',
            'username'   => 'admin',
            'password'   => Hash::make('123'), // Required for Laravel Auth
            'created_at' => Carbon::now(
                
            ),
            'updated_at' => Carbon::now(),
        ]);
    }
}