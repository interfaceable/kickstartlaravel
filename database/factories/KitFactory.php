<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Kit;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Kit>
 */
class KitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->company;

        return [
            'user_id' => User::query()->inRandomOrder()->first()?->id ?? User::factory(),
            'name' => $name,
            'slug' => Str::slug($name).'-'.fake()->numberBetween(1, 100),
            'namespace' => fake()->word.'-'.fake()->numberBetween(1, 1000).'/'.fake()->word,
            'description' => fake()->paragraph(),
            'repo_url' => fake()->url,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Kit $kit) {
            $tags = Tag::inRandomOrder()
                ->take(fake()->numberBetween(1, 5))
                ->pluck('id');

            if ($tags->isEmpty()) {
                $tags = Tag::factory()
                    ->count(fake()->numberBetween(1, 5))
                    ->create()
                    ->pluck('id');
            }

            $kit->tags()->attach($tags);
        });
    }
}
