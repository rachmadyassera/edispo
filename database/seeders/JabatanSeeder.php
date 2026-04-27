<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Unit Kerja Utama
        $sekda = Unit::create([
            'id' => (string) Str::uuid(),
            'name' => 'Sekretariat Daerah'
        ]);


        // 2. Buat Hirarki Jabatan
        $kepalaDaerah = Position::create([
            'id' => (string) Str::uuid(), // Tambahkan ini
            'unit_id' => $sekda->id,
            'name' => 'Kepala Daerah',
            'parent_id' => null,
        ]);

        $sekretarisDaerah = Position::create([
            'id' => (string) Str::uuid(), // Tambahkan ini
            'unit_id' => $sekda->id,
            'name' => 'Sekretaris Daerah',
            'parent_id' => $kepalaDaerah->id,
        ]);

        $asisten1 = Position::create([
            'id' => (string) Str::uuid(), // Tambahkan ini
            'unit_id' => $sekda->id,
            'name' => 'Asisten Pemerintahan',
            'parent_id' => $sekretarisDaerah->id,
        ]);

        // 3. Buat Role (Wajib agar @role di Blade berfungsi)
        $roleOperator = \Spatie\Permission\Models\Role::create(['name' => 'operator']);
        $rolePimpinan = \Spatie\Permission\Models\Role::create(['name' => 'pimpinan']);

        // 4. Buat User dan Langsung Tempelkan Role-nya
        $userOperator = User::create([
            'id' => (string) Str::uuid(),
            'name' => 'Operator Sekda',
            'email' => 'operator@test.com',
            'password' => Hash::make('password'),
            'position_id' => null,
        ]);
        $userOperator->assignRole($roleOperator); // Ini kunci agar dashboard berubah

        User::create([
            'id' => (string) Str::uuid(),
            'name' => 'Pimpinan',
            'email' => 'pimpinan@test.com',
            'password' => Hash::make('password'),
            'position_id' => null,
        ])->assignRole($rolePimpinan);
    }
}
