<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 21),
            'title' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'link' => "https://www.youtube.com/watch?v=qhuiR59-UHs",
            'description' => $this->faker->paragraph($nbSentences = 5, $variableNbSentences = true),
        ];
    }
}
