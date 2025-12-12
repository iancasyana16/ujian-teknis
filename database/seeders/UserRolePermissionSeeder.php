<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat role (firstOrCreate untuk aman)
        $roles = ['super admin', 'manager', 'staff', 'finance'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // 2. Buat permission (firstOrCreate untuk aman)
        $permissions = [
            'users.view',
            'users.create',
            'users.update',
            'users.delete',
            'customers.view',
            'customers.create',
            'customers.update',
            'customers.delete',
            'orders.view',
            'orders.create',
            'orders.update',
            'orders.delete',
            'projects.view',
            'projects.create',
            'projects.update',
            'projects.delete',
            'tasks.view',
            'tasks.create',
            'tasks.update',
            'tasks.delete',
            'finances.view',
            'finances.create',
            'finances.update',
            'finances.delete',
            'reports.view',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 3. Assign permission ke role
        Role::findByName('super admin')->syncPermissions(Permission::all());
        Role::findByName('manager')->syncPermissions([
            'orders.view',
            'orders.create',
            'orders.update',
            'projects.view',
            'projects.create',
            'projects.update',
            'projects.delete',
            'tasks.view',
            'tasks.create',
            'tasks.update',
            'tasks.delete',
            'reports.view'
        ]);
        Role::findByName('staff')->syncPermissions([
            'projects.view',
            'projects.update',
            'tasks.view',
            'tasks.create',
            'tasks.update',
            'tasks.delete',
        ]);
        Role::findByName('finance')->syncPermissions([
            'finances.view',
            'finances.create',
            'finances.update',
            'finances.delete',
            'projects.view',
            'orders.view',
            'orders.update'
        ]);

        // 4. Buat user dan assign role
        $users = [
            ['name' => 'Super Admin', 'email' => 'super@admin.com', 'password' => 'password', 'role' => 'super admin'],
            ['name' => 'Manager', 'email' => 'manager@org.com', 'password' => 'password', 'role' => 'manager'],
            ['name' => 'Staff', 'email' => 'staff@org.com', 'password' => 'password', 'role' => 'staff'],
            ['name' => 'Finance', 'email' => 'finance@org.com', 'password' => 'password', 'role' => 'finance'],
        ];

        foreach ($users as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                ['name' => $data['name'], 'password' => Hash::make($data['password'])]
            );

            // assign role
            $user->assignRole($data['role']);
        }
    }
}
