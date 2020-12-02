<?php

use Illuminate\Database\Seeder;

class PropertyAnalyticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propertyAnalytic = [
            ['property_id' => 1, 'analytic_type_id' => 1, 'value' => '17'],
            ['property_id' => 2, 'analytic_type_id' => 1, 'value' => '21'],
            ['property_id' => 3, 'analytic_type_id' => 1, 'value' => '29'],
            ['property_id' => 2, 'analytic_type_id' => 2, 'value' => '340'],
            ['property_id' => 3, 'analytic_type_id' => 2, 'value' => '823'],
            ['property_id' => 2, 'analytic_type_id' => 3, 'value' => '1.270018421451']
        ];
        DB::table('property_analytics')->insert($propertyAnalytic);
    }
}
