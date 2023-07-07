<?php

namespace Database\Factories;


use App\Models\Category;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class GameFactory extends Factory
{
    protected $model = Game::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $catId = Category::pluck('id')->toArray();
        return [
            'category'=> collect($catId)->random(),
            'name' => $this->faker->name,
            'link' => $this->faker->url,
            'thumbs' => $this->faker->imageUrl($width = 480, $height = 320),
            'status' => $this->faker->randomElement([1]),

        ];
    }
}
