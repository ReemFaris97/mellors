<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(PermissionsTableSeeder::class);
        // $this->call(RoleTableSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(GeneralQuestionSeeder::class);

    }
}
