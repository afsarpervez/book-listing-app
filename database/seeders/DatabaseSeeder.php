<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserCategoryBookTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->count(3)->create();
        $this->call([
            UserCategoryBookTableSeeder::class
        ]);
    }
}
