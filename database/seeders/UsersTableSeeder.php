<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin'
            ],
            [
                'name' => 'customer'
            ],
            [
                'name' => 'employee'
            ],
            [
                'name' => 'manager'
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'surname' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456'),
                'role_id' => 1,
                'updated_at' => now(),
                'created_at' => now()
            ],
        ]);
    }
}
