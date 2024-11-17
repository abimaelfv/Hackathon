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
            'name' => 'ABIMAEL FERNANDEZ VENTURA',
            'email' => '2019110516@udh.edu.pe',
        ]);
    }
}
