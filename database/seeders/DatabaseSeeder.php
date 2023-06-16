<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'nama_produk' => $faker->word,
                'harga' => $faker->randomNumber(4),
                'stok' => $faker->numberBetween(0, 1000),
            ]);
        }
        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'nama_produk' => $faker->word,
                'harga' => $faker->randomNumber(4),
                'stok' => 0,
            ]);
        }
    }
}
