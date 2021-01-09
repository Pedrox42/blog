<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 21),
            'post_id' => $this->faker->numberBetween($min = 1, $max = 30),
            'comment' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];
    }
}
