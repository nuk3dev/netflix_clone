<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
    $klant = Role::create(['name' => 'klant']);
    $contentmanager = Role::create(['name' => 'contentmanager']);
    $admin = Role::create(['name' => 'admin']);

    $create_klanten_permission = Permission::create(['name' => 'create klanten']);
    $update_klanten_permission = Permission::create(['name' => 'update klanten']);
    $Delete_klanten_permission = Permission::create(['name' => 'delete klanten']);

    $create_content_permission = Permission::create(['name' => 'create content']);
    $update_content_permission = Permission::create(['name' => 'update content']);
    $delete_content_permission = Permission::create(['name' => 'delete content']);

    $see_permission_klant = Permission::create(['name' => 'see content']);
    
    $manager_permissions = [
        $create_klanten_permission,
        $update_klanten_permission,
        $Delete_klanten_permission
    ];

    $admin_permissions = [
        $create_content_permission,
        $update_content_permission,
        $delete_content_permission
    ];

    $admin->syncPermissions($admin_permissions);
    $contentmanager->syncPermissions($manager_permissions);
    $klant->syncPermissions($see_permission_klant);
    }
}
