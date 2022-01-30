<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // countries
        $kuwait = Country::create([
            'ar_name' => 'الكويت',
            'en_name' => 'kuwait',
            'status' => 'available',
        ]);
        // cities
        $kuwait_city = $kuwait->cities()->create([
                'ar_name' => 'مدينة الكويت',
                'en_name' => 'kuwait city',
                'status' => 'available',
        ]);
        $aljahra_city =  $kuwait->cities()->create([
            'ar_name' => 'مدينة الجهراء',
            'en_name' => 'aljahra city',
            'status' => 'available',
        ]);
        $hawli_city =  $kuwait->cities()->create([
            'ar_name' => 'مدينة حولي',
            'en_name' => 'hawli city',
            'status' => 'available',
        ]);
        // areas
        $kuwait_city->areas()->createMany([
            [
                'ar_name' => 'الخالدية',
                'en_name' => 'alkhalidiah',
                'status' => 'available',
            ],
            [
                'ar_name' => 'الدسمة',
                'en_name' => 'aldasemah',
                'status' => 'available',
            ],
            [
                'ar_name' => 'الدوحة',
                'en_name' => 'aldoha',
                'status' => 'available',
            ]
        ]);
        $aljahra_city->areas()->createMany([
            [
                'ar_name' => 'الجهراء',
                'en_name' => 'aljahra',
                'status' => 'available',
            ],
            [
                'ar_name' => 'الصبية',
                'en_name' => 'alsbiah',
                'status' => 'available',
            ],
            [
                'ar_name' => 'الصليبة',
                'en_name' => 'alslaibah',
                'status' => 'available',
            ]
        ]);
        $hawli_city->areas()->createMany([
            [
                'ar_name' => 'البدع',
                'en_name' => 'albedaa',
                'status' => 'available',
            ],
            [
                'ar_name' => 'الجابرية',
                'en_name' => 'aljabreah',
                'status' => 'available',
            ],
            [
                'ar_name' => 'الرميثة',
                'en_name' => 'alrmaythah',
                'status' => 'available',
            ]
        ]);
    }
}
