<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'test',
            'email' => 'root@example.com',
            'password' => bcrypt('testtest'),
            'sex' => 2,
            ],[
            'name' => 'hiro',
            'email' => 'hiro@example.com',
            'password' => bcrypt('hirohiro'),
            'sex' => 1,
            ],[
            'name' => 'hero',
            'email' => 'hero@example.com',
            'password' => bcrypt('herohero'),
            'sex' => 1,
            ],
        ]);
    }
}
