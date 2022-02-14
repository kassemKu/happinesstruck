<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boysSection = Section::create([
            'ar_name' => 'ألعاب الأطفال الذكور',
            'en_name' => 'male kids toys',
            'published' => true
        ]);
        $girlsSection = Section::create([
            'ar_name' => 'ألعاب الأطفال الاناث',
            'en_name' => 'female kids toys',
            'published' => true
        ]);
        $boysSection->categories()->createMany([
            [
                'ar_name' => 'مطاطيات',
                'en_name' => 'rubbers toys',
                'published' => true
            ],
            [
                'ar_name' => 'ألعاب كهربائية',
                'en_name' => 'electric toys',
                'published' => true
            ]
        ]);
        $girlsSection->categories()->createMany([
            [
                'ar_name' => 'مطاطيات',
                'en_name' => 'rubbers toys',
                'published' => true
            ],
            [
                'ar_name' => 'ألعاب كهربائية',
                'en_name' => 'electric toys',
                'published' => true
            ]
        ]);
    }
}
