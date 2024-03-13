<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(BukuSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('admins')->insert(
            [
                "email" => "admin@mail.com",
                "password" => Hash::make("admin123")
            ]
        );
        DB::table('pustakawans')->insert(
            [
                "no_telp" => "0876543219",
                "nama_lengkap" => "pustakawan",
                "email" => "pustakawan@mail.com",
                "password" => Hash::make("pustakawan123")
            ]
        );
        DB::table('anggotas')->insert(
            [
                "nama_lengkap" => "pelajar",
                "kategori_anggota" => "Pelajar",
                "email" => "pelajar@mail.com",
                "password" => Hash::make("pelajar123")
            ]
        );
    }
}
