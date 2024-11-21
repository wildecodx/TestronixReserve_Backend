<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Testronix Admin',
            'email' => 'admin.testronix@gmail.com',
        ]);

        Customer::factory()
            ->count(5)
            ->hasCustomer(1)
            ->create();
    }
}
