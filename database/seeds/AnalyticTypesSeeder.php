<?php

use Illuminate\Database\Seeder;

class AnalyticTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $analyticTypes = [
            ['name' => 'max_Bld_Height_m', 'units' => 'm', 'is_numeric' => true, 'num_decimal_places' => 1],
            ['name' => 'min_lot_size_m2', 'units' => 'm2', 'is_numeric' => true, 'num_decimal_places' => 0],
            ['name' => 'fsr', 'units' => ':1', 'is_numeric' => true, 'num_decimal_places' => 2]
        ];
        DB::table('analytic_types')->insert($analyticTypes);
    }
}
