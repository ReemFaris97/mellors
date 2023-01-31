<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('users')->delete();

        $users = [
            [
                'name' => 'admin',
                'first_name' => 'admin',
                'middle_name' => 'admin',
                'last_name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '123456',
                'phone'=>'01122710807'
            ]

        ];

        foreach ($users as $item) {
            $user = \App\Models\User::create($item);
            $admin=$user->first();
            $admin->assignRole(Role::where('name', 'Super Admin')->first());
        }
    }
}
