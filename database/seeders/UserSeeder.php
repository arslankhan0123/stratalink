<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\VarDumper;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->where('id', 1)->delete();
        $admin = User::create($this->_createAdmin());
        $admin->assignRole('admin');
        VarDumper::dump("Role Admin create :: Admin");
    }

    /**
     * Create Admin
     *
     * @return array
     */
    private function _createAdmin(): array
    {
        return [
            'name'    =>  'Admin',
            'email'   =>  'admin@admin.com',
            'password'   =>  Hash::make('12345678'),
            'role_id' => 1,
        ];
    }
}
