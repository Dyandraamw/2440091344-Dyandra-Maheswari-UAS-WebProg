<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'role_name' => 'Admin'
            ],
            [
                'role_name' => 'User'
            ]
        ];

        DB::table('roles')->insert($data);
    }
}
