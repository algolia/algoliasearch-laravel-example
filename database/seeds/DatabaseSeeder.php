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
        \App\Post::disableSearchSyncing();

        $this->call(AuthorSeeder::class);
        $this->call(PostSeeder::class);

        \App\Author::all()->searchable();
        \App\Post::all()->searchable();

        \App\Post::enableSearchSyncing();
    }
}
