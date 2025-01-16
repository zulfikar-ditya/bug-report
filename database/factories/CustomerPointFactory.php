<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerPoint>
 */
class CustomerPointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['in', 'out']);

        $in = 0;
        if ($type === 'in') {
            $in = $this->faker->numberBetween(1, 100);
        }

        $out = 0;
        if ($type === 'out') {
            $out = $this->faker->numberBetween(1, 100);
        }

        return [
            'customer_id' => \App\Models\Customer::factory()->create()->id,
            'in' => $in,
            'out' => $out,
        ];
    }
}
