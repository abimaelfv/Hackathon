<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'codigo' => '2019110516',
            'name' => 'ABIMAEL EPIFANIO',
            'apellidos' => 'FERNANDEZ VENTURA',
            'email' => '2019110516@udh.edu.pe',
        ])->assignRole('ADMINISTRADOR');

        User::factory()->create([
            'codigo' => 'aldo.ramirez',
            'name' => 'ALDO ENRIQUE',
            'apellidos' => 'RAMIREZ CHAUPIS',
            'email' => 'aldo.ramirez@udh.edu.pe',
        ])->assignRole('ADMINISTRADOR');
    }
}
