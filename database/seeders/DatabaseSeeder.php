<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(CartItemSeeder::class);
        // $this->call(CartSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(OrderItemSeeder::class);
        // $this->call(OrderSeeder::class);
        // $this->call(PaymentSeeder::class);
        // $this->call(ProductSeeder::class);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
