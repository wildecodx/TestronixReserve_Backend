<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{


    protected $model = Admin::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $status = $this->faker->randomElement(['S', 'R', 'C']);
        return [
            'status'  => $status
        ];
    }
}
