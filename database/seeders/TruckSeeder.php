<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Truck;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Truck::create([
            'ar_name' => 'العربة الأولى',
            'en_name' => 'first truck',
            'en_type' => 'toyota',
            'ar_type' => 'تويوتا',
            'size' => '12',
            'min_price_per_event' => 199,
            'en_slug' => Str::slug('first truck'),
            'ar_slug' => Str::slug('العربة الأولى'),
            'status' => 'active',
        ]);
    }
}
