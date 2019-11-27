<?php

use Illuminate\Database\Seeder;

class PostUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_users')->insert([
            [
                'user_id' => 1,
                'post_id' => 1,
            ]
        ]);
    }
}
