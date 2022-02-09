<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);

        $create_post = Permission::create(['name' => 'create_post']);
        $delete_post = Permission::create(['name' => 'delete_post']);
        $update_post = Permission::create(['name' => 'update_post']);

        $admin->givePermissionTo([
            $create_post,
            $update_post,
            $delete_post
        ]);
    }
}
