<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
            'host_id' => 1,
            'title' => 'hogehoge',
            'about_group' => 'そのイベントについてです。',
            'gym_id' => 1,
            'event_date' => '2019/11/20',
            'start_time' => '19:00',
            'end_time' =>  '20:00',
            'number_limit' =>  0,
            'sex_limit' =>  0,
            ],[
            'host_id' => 2,
            'title' => 'hogehoge2',
            'about_group' => 'このイベントについてです。',
            'gym_id' => 2,
            'event_date' => '2019/11/21',
            'start_time' => '19:30',
            'end_time' =>  '21:00',
            'number_limit' =>  3,
            'sex_limit' =>  1,
            ],[
            'host_id' => 3,
            'gym_id' => 3,
            'title' => 'hogehoge3',
            'about_group' => 'あのイベントについてです。',
            'event_date' => '2019/11/22',
            'start_time' => '19:00',
            'end_time' =>  '21:30',
            'number_limit' =>  6,
            'sex_limit' =>  2,
            ]
        ]);
    }
}
