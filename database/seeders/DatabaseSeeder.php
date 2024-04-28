<?php

namespace Database\Seeders;

use App\Models\RoleAndPermission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('1234a'), // You should hash your password
            'type' => '1',
            'user_type_id' => '0',
        ]);

        User::create([
            'name' => 'Registrar',
            'username' => 'registrar',
            'password' => bcrypt('1234a'), // You should hash your password
            'type' => '3',
            'user_type_id' => '0',
        ]);

        RoleAndPermission::create([
            'role' => 'Registrar',
            'permission' => 'Assessments, SMS Management',
            'status' => '1',
        ]);
    }
}
