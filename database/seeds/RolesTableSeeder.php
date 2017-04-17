<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('roles')->delete();

        \Illuminate\Support\Facades\DB::table('roles')->insert([
            [
                'name'         => 'admin',
                'display_name' => 'Admin',
                'description'  => 'admin',
            ],
            [
                'name'         => 'manager',
                'display_name' => 'Manager',
                'description'  => 'manager',
            ],
            [
                'name'         => 'accountant',
                'display_name' => 'Accountant',
                'description'  => 'ccountant',
            ],
        ]);
    }
}
