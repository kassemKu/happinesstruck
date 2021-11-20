<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
            'ar_name' => 'باكاج السعادة',
            'ar_short_description' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.',
            'ar_description' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.',
            'en_name' => 'happiness package',
            'en_short_description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et, illum! Cumque eos ratione sequi optio',
            'en_description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus optio est, ea repellat a provident non itaque consequatur nihil sunt velit obcaecati eligendi doloribus distinctio blanditiis dolor in quibusdam nisi.',
            'status' => 'active',
            'price_per_event' => 165.00,
            'truck_id' => 1,
            'mediaIds' => json_encode(1),
            'en_slug' => Str::slug('happiness package'),
            'ar_slug' => Str::slug('باكاج السعادة'),
        ]);


        Media::whereIn('id', array($happiness_package->mediaIds))->update([
            'model_id' => $happiness_package->id,
            'model_type' => Package::class
        ]);
        $happiness_package->update(['mediaIds' => array($happiness_package->mediaIds)]);

        $happiness_package->items()->create([
            'ar_name' => 'مجموعة رسومات',
            'ar_short_description' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.',
            'ar_description' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.',
            'en_name' =>'collection of graphics',
            'en_short_description' =>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et, illum! Cumque eos ratione sequi optio',
            'en_description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus optio est, ea repellat a provident non itaque consequatur nihil sunt velit obcaecati eligendi doloribus distinctio blanditiis dolor in quibusdam nisi.',
            'en_slug' => Str::slug('مجموعة رسومات'),
            'ar_slug' => Str::slug('collection of graphics'),
            'status' => 'active',
            'price_per_event' => '10.00',
            'SKU' => 'IQUEW@!0192',
            'mediaIds' => "[1]",
        ]);
    }
}
