<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'code' => strtoupper($this->getCode(5)),
            'name' => strtoupper($this->faker->unique()->sentence(2)),
            'dimension' => '12 X 24 MM',
            'unit' => 'PCS'
        ];
    }

    /**
     * Get a random stirng
     *
     * @return string
     */
    public function getCode($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
     
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
     
        return $randomString;
    }
}
