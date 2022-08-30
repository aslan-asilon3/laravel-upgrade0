<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesPermissionSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'publish users']);
        Permission::create(['name' => 'unpublish users']);

        //create roles and assign existing permissions
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo('view users');
        $userRole->givePermissionTo('create users');
        $userRole->givePermissionTo('edit users');
        $userRole->givePermissionTo('delete users');

        $managerRole = Role::create(['name' => 'manager']);
        $managerRole->givePermissionTo('view users');
        $managerRole->givePermissionTo('create users');
        $managerRole->givePermissionTo('edit users');
        $managerRole->givePermissionTo('delete users');
        $managerRole->givePermissionTo('publish users');
        $managerRole->givePermissionTo('unpublish users');

        $superadminRole = Role::create(['name' => 'superadmin']);
        // gets all permissions via Gate::before rule

        // create demo users
        $user = User::factory()->create([
            'name' => 'aslanmanager',
            'email' => 'aslanmanager@gmail.com',
            'password' => bcrypt('aslanmanager')
        ]);
        $user->assignRole($managerRole);

        $user = User::factory()->create([
            'name' => 'aslanuser',
            'email' => 'aslanuser@gmail.com',
            'password' => bcrypt('aslanuser')
        ]);
        $user->assignRole($userRole);

        $user = User::factory()->create([
            'name' => 'aslansuperadmin',
            'email' => 'aslansuperadmin@gmail.com',
            'password' => bcrypt('aslansuperadmin')
        ]);
        $user->assignRole($superadminRole);
    }
}
