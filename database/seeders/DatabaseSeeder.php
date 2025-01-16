<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerPoint;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        Customer::factory()
            ->count(10)
            ->afterCreating(function (Customer $customer) {
                CustomerPoint::factory()
                    ->count(15)
                    ->create([
                        'customer_id' => $customer->id,
                    ]);
            })
            ->create();
    }
}
