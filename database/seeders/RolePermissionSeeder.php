<?php

namespace Database\Seeders;

use App\Enum\Permissions;
use App\Enum\Roles;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            Roles::TEACHER => Permissions::teacherPermissions(),
            Roles::STUDENT => Permissions::studentPermissions(),
        ];
        
        foreach ($roles as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
        
            foreach ($permissions as $permissionName) {
                $permission = Permission::firstOrCreate(['name' => $permissionName]);
                $role->permissions()->syncWithoutDetaching([$permission->id]);
            }
        }
        
    }
}
