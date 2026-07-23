<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Peserta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::firstOrCreate([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => 'hash',
        // ]);
        // User::firstOrCreate(
        // [
        //     'name' => 'Admin User',
        //     'email' => 'admin@example.com',
        //     'password' => 'hash',
        // ]);
        Peserta::create([
            'nama'=>'Test User',
            'alamat' => 'Jl. jalan'
        ]);
        Peserta::create([
            'nama'=>'Budi',
            'alamat' => 'Jl. ini budi'
        ]);

        $this->call(ProdukSeeder::class);
    }
}
