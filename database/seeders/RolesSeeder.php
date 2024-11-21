<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'ADMINISTRADOR']);
        $estudiante = Role::create(['name' => 'ESTUDIANTE']);

        Permission::create(['name' => 'panel'])->syncRoles($admin);
        Permission::create(['name' => 'inscripcion'])->syncRoles($estudiante);
        Permission::create(['name' => 'datos'])->syncRoles($admin);
        Permission::create(['name' => 'inscripciones'])->syncRoles($admin);
    }
}
