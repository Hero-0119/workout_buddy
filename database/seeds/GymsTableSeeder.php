<?php

use Illuminate\Database\Seeder;

class GymsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gyms')->insert([
            [
            'gym_name' => '豊島区 池袋スポーツジム',
            'latitude' => '35.734652',
            'longitude' => '139.715095',
            ],[
            'gym_name' => '新宿区立 新宿スポーツセンター',
            'latitude' => '35.715623',
            'longitude' => '139.705543',
            ],[
            'gym_name' => '中央区立 総合スポーツセンター',
            'latitude' => '35.691753',
            'longitude' => '139.788821',
            ]
        ]);
    }
}
