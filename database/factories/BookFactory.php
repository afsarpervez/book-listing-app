<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> rtrim($this->faker->sentence(rand(2,4)), "."),
            'body' => $this->faker->paragraph(rand(3,5), true),
            'author' => rtrim($this->faker->sentence(rand(1,3)), "."),
            'edition' => rand(1,10),
            'part' => rand(1,10),
            'price' => rand(1,1000),
            'sales_price' => rand(1,1000),
            'user_id' => User::pluck('id')->random(),
            'category_id' => Category::pluck('id')->random()
        ];

    }
}
