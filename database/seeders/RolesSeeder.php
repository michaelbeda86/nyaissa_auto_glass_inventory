<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // Create or get roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Assign roles to users
        $admin = User::first();
        if ($admin && !$admin->roles->contains($adminRole->id)) {
            $admin->roles()->attach($adminRole);
        }
    }
}
