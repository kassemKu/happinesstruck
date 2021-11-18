<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $happiness_package = Package::create([
            'ar_name' => '',
            'ar_short_description' => '',
            'ar_description' => '',
            'en_name' => '',
            'en_short_description' => '',
            'en_description' => '',
            'status' => 'active',
            'price_per_event' => 165.00,
            'truck_id' => 1,
            'mediaIds' => [1],
        ]);
    }
}
