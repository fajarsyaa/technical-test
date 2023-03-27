<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Approve;
use App\Models\BranchOffice;
use App\Models\Driver;
use App\Models\Employe;
use App\Models\Headquarters;
use App\Models\Mine;
use App\Models\User;
use App\Models\Vehicle;
use Database\Factories\VehicleFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => "admin",
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'level' => "admin",
            'position' => "admin"
        ]);
        User::factory()->create([
            'name' => "mandor",
            'email' => "mandor@mandor.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'level' => "superior",
            'position' => "mdr"
        ]);
        User::factory()->create([
            'name' => "supervisor",
            'email' => "supervisor@spv.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'level' => "superior",
            'position' => "spv"
        ]);
        User::factory()->create([
            'name' => "hrd",
            'email' => "hrd@hrd.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'level' => "superior",
            'position' => "hrd"
        ]);
        Vehicle::factory(70)->create();

        Headquarters::factory()->create([
            "name" => "Kantor Pusat Jawa Timur",
            "address" => "Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur",
            "description" => "kantor pusat",
        ]);

        BranchOffice::factory()->create([
            "headquarter_id" => 1,
            "name" => "Kantor Cabang Malang",
            "address" => "Jl. Kartika No.2, Kota Batu, Malang, Jawa Timur",
            "description" => "Kantor Cabang",
        ]);

        Mine::factory(6)->create();

        Driver::factory(50)->create();
    }
}
