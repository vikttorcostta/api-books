<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\StatusBook;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Enum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'cover' => $this->faker->imageUrl(),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'publication_year' => $this->faker->year(),
            'isbn' => $this->faker->isbn13(),
            'status' => StatusBook::UNREAD,
            'user_id' => User::factory()->create(),
            'category_id' => Category::factory()->create()
        ];
    }
}
