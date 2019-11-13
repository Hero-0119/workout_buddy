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
            'about_group' => 'test',
            ],[
            'user_id' => 1,
            'gym_id' => 1,
            'title' => 'hogehoge2',
            'about_group' => 'test2',
            ],[
            'user_id' => 1,
            'gym_id' => 1,
            'title' => 'hogehoge3',
            'about_group' => 'test3',
            ]
        ]);
    }
}
