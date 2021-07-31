<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class UserCategoryBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('books')->delete();
        \DB::table('categories')->delete();
        \DB::table('users')->delete();

        User::factory()->count(3)->create()->each(function($u){
            $u->categories()->saveMany(
                Category::factory()->count(rand(1,3))->make())->each(function($c){
                    $c->books()->saveMany(Book::factory()->count(rand(1,4))->make());
                });
        });
    }
}
