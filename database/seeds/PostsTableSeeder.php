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
            'user_id' => 1,
            'gym_id' => 1,
            'title' => 'hogehoge',
            'about_group' => 'イベントについてです。',
            'event_date' => '2019/11/20',
            'start_time' => '19:00',
            'end_time' =>  '20:00',
            ],[
            'user_id' => 1,
            'gym_id' => 2,
            'title' => 'hogehoge2',
            'about_group' => 'イベントについてです。',
            'event_date' => '2019/11/21',
            'start_time' => '19:30',
            'end_time' =>  '21:00',
            ],[
            'user_id' => 1,
            'gym_id' => 3,
            'title' => 'hogehoge3',
            'about_group' => 'イベントについてです。',
            'event_date' => '2019/11/22',
            'start_time' => '19:00',
            'end_time' =>  '21:30',
            ]
        ]);
    }
}
