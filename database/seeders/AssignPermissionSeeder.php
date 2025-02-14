<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Symfony\Component\VarDumper\VarDumper;

class AssignPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $config         =   config('role-permission-set');
        $roles          =   $config['roles-set'];

        foreach ($roles as $role => $value) {
            VarDumper::dump("Adding Role $value :: $role");
            $role = Role::firstOrCreate(
                ['title' =>  $value],
                ['name' =>  $role],
                ['guard_name' =>  'web'],
            );
            $modules    =   $config['module-permission-set'][$role->name] ?? null;
            if ($modules) {
                foreach ($modules as $module) {
                    foreach ($module as $permission) {
                        VarDumper::dump("Assign Permission $permission to $role->name");
                        $role->givePermissionTo($permission);
                    }
                }
            }
        }
    }
}
