<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CommentsTableSeeder::class,
            GymsTableSeeder::class,
            PostsTableSeeder::class,
            PostUserTableSeeder::class,
            RatingsTableSeeder::class,
            TotalizationsTableSeeder::class,
        ]);
    }
}
