<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 50)->create()->each(function ($post) {
            $post->comments()->saveMany(factory(\App\Comment::class, rand(0, 10))->make());
        });
    }
}
