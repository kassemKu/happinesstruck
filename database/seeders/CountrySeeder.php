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
            'shipping_cost' => 0.00
        ]);
        // states
        $alasema_state = $kuwait->states()->create([
                'ar_name' => 'محافظة العاصمة',
                'en_name' => 'alasema state',
                'status' => 'available',
                'shipping_cost' => 0.00
        ]);
        $alahmadi_state =  $kuwait->states()->create([
            'ar_name' => 'محافظة الأحمدي',
            'en_name' => 'alahmadi state',
            'status' => 'available',
            'shipping_cost' => 0.00
        ]);
        $alfrawaniah_state =  $kuwait->states()->create([
            'ar_name' => 'محافظة الفروانية',
            'en_name' => 'alfrawaniah state',
            'status' => 'available',
            'shipping_cost' => 0.00
        ]);
        $aljahraa_state = $kuwait->states()->create([
            'ar_name' => 'محافظة الجهراء',
            'en_name' => 'aljahraa state',
            'status' => 'available',
            'shipping_cost' => 0.00
        ]);
        $hawali_state =  $kuwait->states()->create([
            'ar_name' => 'محافظة حولي',
            'en_name' => 'hawali state',
            'status' => 'available',
            'shipping_cost' => 0.00
        ]);
        $mobarakAlkabeer_state =  $kuwait->states()->create([
            'ar_name' => 'محافظة مبارك الكبير',
            'en_name' => 'mobarakAlkabeer state',
            'status' => 'available',
            'shipping_cost' => 0.00
        ]);
        // areas
        $alasema_state->areas()->createMany([
            [
                'ar_name' => 'مدينة الكويت',
                'en_name' => 'alkwait city',
                'status' => 'available',
                'shipping_cost' => 1.00
            ],
            [
                'ar_name' => 'الدسمة',
                'en_name' => 'aldasemah',
                'status' => 'available',
                'shipping_cost' => 1.00
            ],
            [
                'ar_name' => 'الدوحة',
                'en_name' => 'aldoha',
                'status' => 'available',
                'shipping_cost' => 1.00
            ]
        ]);
        $alahmadi_state->areas()->createMany([
            [
                'ar_name' => 'الاحمدي',
                'en_name' => 'alahmadi',
                'status' => 'available',
                'shipping_cost' => 2.00
            ],
            [
                'ar_name' => 'الخيزران',
                'en_name' => 'alkhizran',
                'status' => 'available',
                'shipping_cost' => 2.00
            ],
            [
                'ar_name' => 'الرقة',
                'en_name' => 'alraqa',
                'status' => 'available',
                'shipping_cost' => 2.00
            ]
        ]);
        $alfrawaniah_state->areas()->createMany([
            [
                'ar_name' => 'أبرق خيطان',
                'en_name' => 'abraq khetan',
                'status' => 'available',
                'shipping_cost' => 2.00
            ],
            [
                'ar_name' => 'أشبيليا',
                'en_name' => 'ashbelia',
                'status' => 'available',
                'shipping_cost' => 2.00
            ],
            [
                'ar_name' => 'الاندلس',
                'en_name' => 'alandlos',
                'status' => 'available',
                'shipping_cost' => 2.00
            ]
        ]);
        $aljahraa_state->areas()->createMany([
            [
                'ar_name' => 'الجهراء',
                'en_name' => 'aljahraa',
                'status' => 'available',
                'shipping_cost' => 2.00
            ],
            [
                'ar_name' => 'الصبية',
                'en_name' => 'alsbiah',
                'status' => 'available',
                'shipping_cost' => 2.00
            ],
            [
                'ar_name' => 'الصليبة',
                'en_name' => 'alsalebiah',
                'status' => 'available',
                'shipping_cost' => 2.00
            ]
        ]);
        $hawali_state->areas()->createMany([
            [
                'ar_name' => 'البدع',
                'en_name' => 'albedaa',
                'status' => 'available',
                'shipping_cost' => 2.00
            ],
            [
                'ar_name' => 'الجابرية',
                'en_name' => 'aljabria',
                'status' => 'available',
                'shipping_cost' => 2.00
            ],
            [
                'ar_name' => 'الرميثة',
                'en_name' => 'alrmetha',
                'status' => 'available',
                'shipping_cost' => 2.00
            ]
        ]);
        $mobarakAlkabeer_state->areas()->createMany([
            [
                'ar_name' => 'أبو الحصانية',
                'en_name' => 'abo alhasaniah',
                'status' => 'available',
                'shipping_cost' => 2.00
            ],
            [
                'ar_name' => 'أبو فطيرة',
                'en_name' => 'abofaterah',
                'status' => 'available',
                'shipping_cost' => 2.00
            ],
            [
                'ar_name' => 'العدان',
                'en_name' => 'aladan',
                'status' => 'available',
                'shipping_cost' => 2.00
            ]
        ]);
    }
}
