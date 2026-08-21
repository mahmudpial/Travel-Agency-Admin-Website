<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);
        $staff = Role::create(['name' => 'Staff']);

        // Create permissions (We will add more later based on requirements)
        // For now, let's create a basic one just for example
        $viewDashboard = Permission::create(['name' => 'view dashboard']);

        // Assign permissions to roles
        $admin->givePermissionTo($viewDashboard);
        $manager->givePermissionTo($viewDashboard);
        $staff->givePermissionTo($viewDashboard);
        
        // Note: Super Admin gets all permissions via Gate::before in AuthServiceProvider or AppServiceProvider,
        // so we don't need to assign individual permissions to Super Admin.

        // Assign Super Admin role to the default user
        $user = User::where('email', 'admin@example.com')->first();
        if ($user) {
            $user->assignRole($superAdmin);
        }
    }
}
