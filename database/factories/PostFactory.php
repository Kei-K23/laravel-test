<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(),
            "tags" => "tag2, tag3",
            "company" => $this->faker->company(),
            "location" => $this->faker->city(),
            "email" => $this->faker->companyEmail(),
            "website" => $this->faker->url(),
            "description" => $this->faker->paragraph(6),
        ];
    }
}
