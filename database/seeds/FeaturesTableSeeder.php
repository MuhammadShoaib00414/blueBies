<?php

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
            [
                'name' => 'Establishment logo + introductory overview',
                'localization' => 'شعار المنشأة+ نبذة تعريفية'
            ],
            [
                'name' => 'Add branches',
                'localization' => 'إضافة فروع'
            ],
            [
                'name' => 'Send and receive requests and offers',
                'localization' => 'إرسال واستقبال الطلبات والعروض'
            ],
            [
                'name' => 'Appearing among the most engaged customers',
                'localization' => 'الظهور بين أكثر العملاء تفاعلًا'
            ],
            [
                'name' => 'Banner at the top of the home page - 5 months',
                'localization' => 'بانر في أعلى الصفحة الرئيسية - 5 أشهر'
            ],
            [
                'name' => 'Banner at the top of the foreign orders page - 5 months',
                'localization' => 'بانر في أعلى صفحة الطلبات الأجنبية - 5 أشهر'
            ],
            [
                'name' => 'Banner at the top of the order creation page - 5 months',
                'localization' => 'بانر في أعلى صفحة إنشاء الطلبات - 5 أشهر'
            ],
            [
                'name' => 'Banner at the top of our clients page - 5 months',
                'localization' => 'بانر في أعلى صفحة عملائنا - 5 أشهر'
            ],
            [
                'name' => 'Banner at the top of the control panel - 5 months',
                'localization' => 'بانر في أعلى لوحة التحكم - 5 أشهر'
            ],
            [
                'name' => 'Banner at the top of the offers page - 5 months',
                'localization' => 'بانر في أعلى صفحة العروض - 5 أشهر'
            ],
            [
                'name' => 'Featured customers banner in the control panel - 5 months',
                'localization' => 'بانر العملاء المميزين في لوحة التحكم - 5 أشهر'
            ],
        ];

        DB::table('features')->insert($features);

    }
}
