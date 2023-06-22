<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Super Admin',
                    'guard_name' => 'web',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),

            1 =>
                array (
                    'id' => 2,
                    'name' => 'zone supervisor',
                    'guard_name' => 'web',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Technical',
                    'guard_name' => 'web',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Operation',
                    'guard_name' => 'web',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            4 =>
               array (
                'id' => 5,
                'name' => 'Skill Games',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
             'id' => 6,
             'name' => 'Maintenance',
             'guard_name' => 'web',
             'created_at' => NULL,
             'updated_at' => NULL,
         ),
            6 =>
            array (
            'id' => 7,
            'name' => 'Health & Safety',
            'guard_name' => 'web',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        7 =>
        array (
        'id' => 8,
        'name' => 'Ride & Ops',
        'guard_name' => 'web',
        'created_at' => NULL,
        'updated_at' => NULL,
    ),
        ));
    }
}
