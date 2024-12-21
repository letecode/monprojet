<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        $agent = Role::create(['name' => 'agent']);

        Permission::create(['name' => 'Creer des agents']);
        Permission::create(['name' => 'Supprimer des agents']);
        Permission::create(['name' => 'Gerer des documents']);
        $gt = Permission::create(['name' => 'Gerer tout']);

        $admin->givePermissionTo($gt, 'Supprimer des agents');
        $agent->givePermissionTo('Gerer des documents');
        $editor->givePermissionTo('Creer des agents');

        
    }
}
