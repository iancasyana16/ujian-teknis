<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['super admin', 'manager', 'staff', 'finance'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

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
            Permission::create(['name' => $permission]);
        }

        $superAdmin = Role::findByName('super admin');
        $superAdmin->syncPermissions(Permission::all());

        $manager = Role::findByName('manager');
        $manager->syncPermissions([
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
            'reports.view',
        ]);

        $staff = Role::findByName('staff');
        $staff->syncPermissions([
            'projects.view',
            'projects.update',
            'tasks.view',
            'tasks.create',
            'tasks.update',
            'tasks.delete',
        ]);

        $finance = Role::findByName('finance');
        $finance->syncPermissions([
            'finances.view',
            'finances.create',
            'finances.update',
            'finances.delete',
            'projects.view',
            'orders.view',
            'orders.update',
        ]);
    }
}
