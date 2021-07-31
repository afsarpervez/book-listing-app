<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();
        \DB::table('users')->delete();

        User::factory()->count(3)->create()->each(function($u){
            $u->categories()->saveMany(
                Category::factory()->count(rand(1,3))->make());
        });
    }
}
