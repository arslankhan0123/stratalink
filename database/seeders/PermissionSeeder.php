<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Symfony\Component\VarDumper\VarDumper;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $config      = config('role-permission-set');
        $permissions = $config['permission-set'];

        $processPermission = function ($permission, $data) {
            $name = $data[0];
            $description = $data[1];
            $existingPermission = Permission::where('name', $name)->first();
            if (!$existingPermission) {
                VarDumper::dump("Permission added: $name");
                Permission::Create([
                    'name' => $name,
                    'description' => $description,
                    'guard_name' => 'web',
                ]);
            } else {
                VarDumper::dump("Permission '$name' already exists");
            }
        };
        array_map($processPermission, array_keys($permissions), $permissions);
    }
}
