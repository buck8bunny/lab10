<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /*
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /*
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status_id' => $this->faker->randomElement([1,2,3]),
            'user_id' => $this->faker->randomElement(User::all()->pluck("id")),
            'title' => $this->faker->word,
            'announce' => $this->faker->text,
            'content' => $this->faker->text,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
