<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [
            ['suburb' => 'Parramatta', 'state' => 'NSW', 'country' => 'Australia', 'guid' => Str::uuid()->toString()],
            ['suburb' => 'Parramatta', 'state' => 'NSW', 'country' => 'Australia', 'guid' => Str::uuid()->toString()],
            ['suburb' => 'Parramatta', 'state' => 'NSW', 'country' => 'Australia', 'guid' => Str::uuid()->toString()]
        ];
        DB::table('properties')->insert($properties);
    }
}
