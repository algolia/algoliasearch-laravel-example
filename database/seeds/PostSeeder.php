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
        App\Author::all()->each(function ($item, $key) {
            $item->posts()->saveMany(
                factory(App\Post::class, rand(7, 15))->create()->each(function ($post) {
                    $post->comments()->saveMany(
                        factory(\App\Comment::class, rand(0, 10))->make()
                    );
            }));
        });


    }
}
