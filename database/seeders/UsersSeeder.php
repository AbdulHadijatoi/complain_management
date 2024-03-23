<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::findOrCreate('admin');
        $contractorRole = Role::findOrCreate('contractor');

        // Create admin user
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $adminUser->assignRole($adminRole);

        // Create contractor users
        $contractor1 = User::create([
            'name' => 'Contractor 1',
            'email' => 'contractor1@example.com',
            'password' => bcrypt('password'),
        ]);
        $contractor1->assignRole($contractorRole);

        $contractor2 = User::create([
            'name' => 'Contractor 2',
            'email' => 'contractor2@example.com',
            'password' => bcrypt('password'),
        ]);
        $contractor2->assignRole($contractorRole);
    }
}
