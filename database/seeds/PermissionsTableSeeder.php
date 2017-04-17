<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('permissions')->delete();

        \Illuminate\Support\Facades\DB::table('permissions')->insert([
            [
                'name'         => 'manage_tasks',
                'display_name' => 'Manage Tasks',
                'description'  => 'Manage Tasks',
            ],
        ]);
    }
}
