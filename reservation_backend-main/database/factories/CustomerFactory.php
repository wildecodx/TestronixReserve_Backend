<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{

    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $venue = $this->faker->randomElement(['Seminar Room']);

        return [
            'reservation_id' => $this->generateUniqueReservationId(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'rental_time' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'venue' => $venue,
            'notes' => $this->faker->text(200),
        ];
    }

    private function generateUniqueReservationId()
    {
        do {
            $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $reservationId = 'RV100' . $randomNumber;
        } while (DB::table('customers')->where('id', $reservationId)->exists());

        return $reservationId;
    }
}
