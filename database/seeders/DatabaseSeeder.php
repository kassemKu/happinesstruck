<?php

namespace Database\Seeders;

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
        $this->call(LaratrustSeeder::class);
        $this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(6)->create();
        // \App\Models\Product::factory(22)->create();
        // $this->call(TruckSeeder::class);
        // $this->call(PackageSeeder::class);
    }
}
