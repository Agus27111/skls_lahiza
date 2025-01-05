<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage teams',
            'manage about',
            'manage appointments',
            'manage hero section',
            'manage blogs',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin']);

        $user = User::create([
            'name' => 'admin',
            'email' => 'agussetiawanbelajar@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole($superAdminRole);

        $kepalaSekolahRole = Role::firstOrCreate(['name' => 'kepala-sekolah']);

        $kepalaSekolahPermission = [
            'manage blogs',
        ];

        $kepalaSekolahRole->syncPermissions($kepalaSekolahPermission);

    }
}
