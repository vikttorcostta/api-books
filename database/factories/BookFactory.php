<?php

namespace Database\Factories;

use App\Enums\StatusBook;
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
            'status' => new Enum(StatusBook::class),
            'user_id' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'category_id' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
        ];
    }
}
